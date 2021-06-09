@extends('admin.layouts.master')

@section('title', $command->exists ? __('Edit command') : __('Add new command'))

@section('content')
    <div class="content-i">
        <div class="content-box col-xxl-12">
            <div class="element-wrapper">
                <div class="element-box">
                    <form
                        @if ($command->exists)
                            action="{{ route('admin.commands.update', $command) }}"
                        @else
                            action="{{ route('admin.commands.store') }}"
                        @endif
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        @if ($command->exists)
                            @method('PUT')
                        @endif

                        <h5 class="form-header">
                            @yield('title')
                            {{ $command->exists ? ' | ' . $command->name : '' }}
                        </h5>

                        <div class="form-group">
                            <label for="name">
                                @lang('Command groups')
                            </label>

                            <select name="command_groups[]" id="command_groups" class="form-control" multiple="true">
                                <option value="">@lang('Please choose command groups')...</option>
                                @foreach ($commandGroups as $commandGroup)
                                    <option
                                        value="{{ $commandGroup->id }}"
                                        @if(in_array($commandGroup->id, old('command_groups', $command->commandGroups->pluck('id')->toArray())))
                                            selected="selected"
                                        @endif
                                    >
                                        {{ $commandGroup->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                    <label for="name">@lang('Command')</label>
                                    <input
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        placeholder="@lang('Please enter the command')"
                                        type="text"
                                        required
                                        value="{{ old('name') ?? $command->name ?? '' }}"
                                    >
                                    @if ($errors->has('name'))
                                        <div class="help-block form-text text-muted form-control-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">
                                @lang('Action')
                                <span class="text-danger">*</span>
                            </label>

                            <select required name="action" id="action" class="form-control">
                                <option
                                    value="STOP_SESSION"
                                    @if(old('action', $command->action) === 'STOP_SESSION')
                                        selected="selected"
                                    @endif
                                >@lang('Stop session')</option>
                                <option
                                    value="ONLY_BACKSPACE"
                                    @if(old('action', $command->action) === 'ONLY_BACKSPACE')
                                        selected="selected"
                                    @endif
                                >@lang('Allow only backspace')</option>
                                {{--<option--}}
                                {{--    value="WARNING"--}}
                                {{--    @if(old('actioc', $command->action) === 'WARNING')--}}
                                {{--        selected="selected"--}}
                                {{--    @endif--}}
                                {{-->@lang('Show warning')</option>--}}
                                <option
                                    value="LOG"
                                    @if(old('action', $command->action) === 'LOG')
                                        selected="selected"
                                    @endif
                                >@lang('Log forbidden command')</option>
                            </select>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input
                                    class="form-check-input"
                                    id="vnc"
                                    type="checkbox"
                                    name="vnc"
                                    value="1"
                                    @if((empty(old()) && $command->vnc) || old('vnc'))
                                        checked
                                    @endif
                                >
                                VNC (Linux)
                            </label>
                        </div>

                        <br>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input
                                    class="form-check-input"
                                    id="rdp"
                                    type="checkbox"
                                    name="rdp"
                                    value="1"
                                    @if((empty(old()) && $command->rdp) || old('rdp'))
                                        checked
                                    @endif
                                >
                                RDP (Windows)
                            </label>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-block btn-primary mt-3">
                                    @lang('Save')
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('external-js')
    <script>
        $('select').selectize();
    </script>
@endsection

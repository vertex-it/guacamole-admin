@extends('admin.layouts.master')

@section('title', $commandGroup->exists ? __('Edit command group') : __('Add new command group'))

@section('content')
    <div class="content-i">
        <div class="content-box col-xxl-12">
            <div class="element-wrapper">
                <div class="element-box">
                    <form
                        @if ($commandGroup->exists)
                            action="{{ route('admin.command-groups.update', $commandGroup) }}"
                        @else
                            action="{{ route('admin.command-groups.store') }}"
                        @endif
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        @if ($commandGroup->exists)
                            @method('PUT')
                        @endif

                        <h5 class="form-header">
                            @yield('title')
                            {{ $commandGroup->exists ? ' | ' . $commandGroup->name : '' }}
                        </h5>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                    <label for="name">@lang('Command group')</label>
                                    <input
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        placeholder="@lang('Please enter the command group name')"
                                        type="text"
                                        required
                                        value="{{ old('name') ?? $commandGroup->name ?? '' }}"
                                    >
                                    @if ($errors->has('name'))
                                        <div class="help-block form-text text-muted form-control-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">
                                @lang('Commands')
                                <span class="text-danger">*</span>
                            </label>

                            <select required name="commands[]" id="commands" class="form-control" multiple="true">
                                <option value="">@lang('Please choose commands')...</option>
                                @foreach ($commands as $command)
                                    <option
                                        value="{{ $command->id }}"
                                        @if(in_array($command->id, old('commands', $commandGroup->commands->pluck('id')->toArray())))
                                            selected="selected"
                                        @endif
                                    >
                                        {{ $command->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">
                                @lang('Users')
                                <span class="text-danger">*</span>
                            </label>

                            <select required name="guac_users[]" id="guac_users" class="form-control" multiple="true">
                                <option value="">@lang('Please choose users')...</option>
                                @foreach ($guacUsers as $guacUser)
                                    <option
                                        value="{{ $guacUser->user_id }}"
                                        @if(in_array($guacUser->user_id, old('guac_users', $commandGroup->guacUsers->pluck('user_id')->toArray())))
                                            selected="selected"
                                        @endif
                                    >
                                        {{ $guacUser->name }}
                                    </option>
                                @endforeach
                            </select>
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

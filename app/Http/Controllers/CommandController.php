<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandRequest;
use App\Models\Command;
use App\Models\CommandGroup;
use Yajra\DataTables\Facades\DataTables;

class CommandController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Command::with('commandGroups')->get())
                ->addColumn('action', function ($command) {
                    return view('admin.commands.datatable.action', compact('command'));
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('admin.commands.index');
    }

    public function create()
    {
        $command = new Command;
        $commandGroups = CommandGroup::all();

        return view('admin.commands.create', compact('command', 'commandGroups'));
    }

    public function store(CommandRequest $request)
    {
        $command = Command::create($request->validated());

        $command->commandGroups()->sync(
            $request->command_groups
        );

        foreach ($command->commandGroups as $commandGroup) {
            foreach ($commandGroup->guacUsers as $guacUser) {
                $guacUser->commands()->syncWithoutDetaching($command->id);
            }
        }

        return redirect()->route('admin.commands.index');
    }

    public function edit(Command $command)
    {
        $commandGroups = CommandGroup::all();

        return view('admin.commands.create', compact('command', 'commandGroups'));
    }

    public function update(CommandRequest $request, Command $command)
    {
        $command->update($request->validated());

        $oldCommandGroups = $command->commandGroups()
            ->whereNotIn('command_group_id', $request->command_groups)
            ->get();

        foreach ($oldCommandGroups as $oldCommandGroup) {
            foreach ($oldCommandGroup->guacUsers as $guacUser) {
                $guacUser->commands()->detach($command->id);
            }
        }

        $command->commandGroups()->sync(
            $request->command_groups
        );

        foreach ($command->commandGroups as $commandGroup) {
            foreach ($commandGroup->guacUsers as $guacUser) {
                $guacUser->commands()->syncWithoutDetaching($command->id);
            }
        }

        return redirect()->route('admin.commands.index');
    }

    public function destroy(Command $command)
    {
        $command->commandGroups()->sync([]);
        $command->guacUsers()->sync([]);
        $command->delete();

        return response()->json(true);
    }
}

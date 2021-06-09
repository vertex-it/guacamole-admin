<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandGroupRequest;
use App\Models\Command;
use App\Models\CommandGroup;
use App\Models\GuacUser;
use Yajra\DataTables\Facades\DataTables;

class CommandGroupController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(CommandGroup::with('commands')->get())
                ->addColumn('action', function ($commandGroup) {
                    return view('admin.command-groups.datatable.action', compact('commandGroup'));
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('admin.command-groups.index');
    }

    public function create()
    {
        $commands = Command::all();
        $commandGroup = new CommandGroup;
        $guacUsers = GuacUser::doesntHave('commandGroups')->get();

        return view('admin.command-groups.create', compact(
            'commands', 'commandGroup', 'guacUsers',
        ));
    }

    public function store(CommandGroupRequest $request)
    {
        $commandGroup = CommandGroup::create($request->validated());

        $commandGroup->commands()->sync($request->commands);
        $commandGroup->guacUsers()->sync($request->guac_users);

        foreach ($commandGroup->guacUsers as $guacUser) {
            $guacUser->commands()->sync($request->commands);
        }

        return redirect()->route('admin.command-groups.index');
    }

    public function edit(CommandGroup $commandGroup)
    {
        $commands = Command::all();
        $guacUsers = GuacUser::doesntHave('commandGroups')
            ->orWhereHas('commandGroups', function ($q) use ($commandGroup) {
                return $q->where('command_group_id', $commandGroup->id);
            })
            ->get();

        return view('admin.command-groups.create', compact(
            'commands',
            'commandGroup',
            'guacUsers',
        ));
    }

    public function update(CommandGroupRequest $request, CommandGroup $commandGroup)
    {
        $commandGroup->update($request->validated());

        $oldCommandGroupUsers = $commandGroup->guacUsers()
            ->whereNotIn('id', $request->guac_users)
            ->get();

        foreach ($oldCommandGroupUsers ?? [] as $oldCommandGroupUser) {
            $oldCommandGroupUser->commands()->sync([]);
        }

        $commandGroup->commands()->sync($request->commands);
        $commandGroup->guacUsers()->sync($request->guac_users);

        foreach ($commandGroup->guacUsers as $guacUser) {
            $guacUser->commands()->sync($request->commands);
        }

        return redirect()->route('admin.command-groups.index');
    }

    public function destroy(CommandGroup $commandGroup)
    {
        foreach ($commandGroup->guacUsers as $guacUser) {
            $guacUser->commands()->sync([]);
        }

        $commandGroup->commands()->sync([]);
        $commandGroup->guacUsers()->sync([]);
        $commandGroup->delete();

        return response()->json(true);
    }
}

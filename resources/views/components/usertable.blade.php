@props(['users' => $users])


<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role
                    </th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) == 0)
                    <tr>
                        <td colspan="5" class="text-center">No Request Yet</td>
                    </tr>
                @else
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ ucwords($user->name) }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ isset($user->roles)? strtoupper($user->roles):'None'; }}</span>
                            </td>
                            <td class="align-middle">
                                <a href="{{ url('user/role',[ $user->id,$user->roles]) }}"
                                    class="btn btn-info btn-sm font-weight-bold text-xs" data-toggle="tooltip"
                                    data-original-title="Edit user">
                                    Change Role
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

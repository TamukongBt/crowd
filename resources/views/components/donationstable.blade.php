@props(['donations' => $donations])


<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Done By</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Goal
                    </th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($donations) == 0)
                    <tr>
                        <td colspan="5" class="text-center">No Request Yet</td>
                    </tr>
                @else
                    @foreach ($donations as $donation)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ ucwords($donation->campaign->name) }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0">{{ ucwords($donation->campaign->raised)  }} FCFA</p>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $donation->campaign->goal }} FCFA</span>
                            </td>
                            <td class="align-middle">
                                <a href="{{ url('campaign', $donation->campaign->id) }}"
                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                    data-original-title="Edit user">
                                    View Campaign
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

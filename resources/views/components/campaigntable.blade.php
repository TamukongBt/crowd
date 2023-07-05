@props(['campaigns' => $campaigns])


<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Campaigns</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Budget
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Completion</th>
                </tr>
            </thead>
            <tbody>
                @if (count($campaigns) == 0)
                    <tr>
                        <td colspan="5" class="text-center">No Campaigns Yet</td>
                    </tr>
                @else
                    @foreach ($campaigns as $campaign)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{asset('storage/' . $campaign->image) }}"
                                            class="avatar avatar-sm me-3" alt="{{ $campaign->name }}">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $campaign->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"> {{ $campaign->raised == null ? 0.00 : $campaign->raised  }} FCFA </span>
                            </td>
                            <td class="align-middle">
                                @php
                                    // calculate percentage of goal reached
                                    $percentage = floor(($campaign->raised / $campaign->goal) * 100);
                                    if ($percentage < 100) {
                                        $width = 'w-' . $percentage;
                                    } elseif ($percentage > 100) {
                                        $width = 'w-100';
                                    }
                                    $percentage > 100 ? 100 : $percentage;
                                @endphp
                                <div class="progress-wrapper w-75 mx-auto">
                                    <div class="progress-info">
                                        <div class="progress-percentage">
                                            <span class="text-xs font-weight-bold">{{ $percentage }}%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="'progress-bar bg-gradient-info  {{ $width }}"
                                            role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        @endif
        </tbody>
        </table>
    </div>
</div>

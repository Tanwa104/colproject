@extends('layout.master')
@section('container')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">See Requests</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
            </ol>
        </nav>
    </div>
</div>

@php
    use Carbon\Carbon;
@endphp

<div class="container text-center mb-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        City Filter
    </button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="exampleModalLabel">City Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('area.fill') }}">
                    <div class="mb-3">
                        <label for="country-dropdown" class="form-label">Select City</label>
                        <select id="country-dropdown" class="form-select" name="city">
                            <option value="">-- Select City --</option>
                            @foreach ($data as $dat)
                                <option value="{{ $dat }}">{{ $dat }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="textbox-count" class="form-label">Enter the number of areas:</label>
                        <input type="number" name="textbox-count" id="textbox-count" class="form-control" min="1" placeholder="Number of textboxes">
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="addTextboxes()">Enter Areas</button> --}}
                    <div id="textbox-container" class="mt-3"></div>
                    <input type="submit" class="btn btn-primary mt-3" value="Submit" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function addTextboxes() {
        event.preventDefault();
        const count = document.getElementById('textbox-count').value;
        const container = document.getElementById('textbox-container');
        container.innerHTML = '';

        for (let i = 0; i < count; i++) {
            const input = document.createElement('input');
            input.type = 'text';
            input.name = `city[${i}]`;
            input.placeholder = `Please enter area name`;
            input.className = 'form-control mb-2';
            container.appendChild(input);
        }
    }
</script>

@php
    $las = session()->get('data');
    $n = count($users);
    $no = count($usernanny);
@endphp

<div class="container mt-4">
    @if ($las != null)
        @php
            $noi = count($las);
        @endphp
        @php
        $processedUsers = [];
    @endphp
    
    @for ($i = 0; $i < $n; $i++)
        @for ($k = 0; $k < $noi; $k++)
            @if ($useradd[$i]->city == $las[$k]->address->city && !in_array($usertime[$i]->id, $processedUsers))
                @php
                    $processedUsers[] = $usertime[$i]->id; // Add user ID to prevent duplication
                @endphp
    
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        Find Assistance
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3">{{ $users[$i]->name }} {{ $users[$i]->lastname }}</h5>
                        <p class="text-center">
                            {{ $useradd[$i]->address_line_1 }}, 
                            {{ $useradd[$i]->address_line_2 }}, 
                            {{ $useradd[$i]->area }}, 
                            {{ $useradd[$i]->city }}, 
                            {{ $useradd[$i]->state }}
                        </p>
                        <p class="text-center">
                            {{ Carbon::parse($usertime[$i]->start_time)->format('g:i A') }} 
                            to 
                            {{ Carbon::parse($usertime[$i]->end_time)->format('g:i A') }}
                        </p>
                        <p class="text-center">Days: {{ str_replace(['[', ']', '"'], '', $usertime[$i]->weekdays) }}</p>
                        <p class="text-center">time preference:{{$usertime[$i]->jobtype}}</p>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Child Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $childCount = count($usernanny[$usertime[$i]->id]);
                                @endphp
                                @for ($j = 0; $j < $childCount; $j++)
                                    <tr>
                                        <td>{{ $usernanny[$usertime[$i]->id][$j]->childname }}</td>
                                        <td>{{ $usernanny[$usertime[$i]->id][$j]->childage }}</td>
                                        <td>{{ $usernanny[$usertime[$i]->id][$j]->childgender }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="d-grid gap-2">
                            {{-- <a href="#" class="btn btn-outline-secondary">Book</a> --}}
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('propindex.build', ['id' => $users[$i]->id, 'tid' => $usertime[$i]->id]) }}" class="btn btn-primary">Make Proposal</a>
                    </div>
                </div>
            @endif
        @endfor
    @endfor
    
    @else
    @php
    $usedUsers = []; // Track displayed usertime IDs
@endphp

@for ($i = 0; $i < $n; $i++)
    @if (!in_array($usertime[$i]->id, $usedUsers))
        @php
            $usedUsers[] = $usertime[$i]->id; // Mark usertime ID as displayed
        @endphp

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                Find Assistance
            </div>
            <div class="card-body">
                <h5 class="card-title text-center mb-3">
                    {{ $users[$i]->name }} {{ $users[$i]->lastname }}
                </h5>
                <p class="text-center">
                    {{ $useradd[$i]->address_line_1 }}, {{ $useradd[$i]->address_line_2 }}, 
                    {{ $useradd[$i]->area }}, {{ $useradd[$i]->city }}, {{ $useradd[$i]->state }}
                </p>
                <p class="text-center">
                    {{ Carbon::parse($usertime[$i]->start_time)->format('g:i A') }} to 
                    {{ Carbon::parse($usertime[$i]->end_time)->format('g:i A') }}
                </p>
                <p class="text-center">
                    Days: {{ str_replace(['[', ']', '"'], '', $usertime[$i]->weekdays) }}
                </p>
                <p class="text-center">time preference:{{$usertime[$i]->jobtype}}</p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Child Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($usernanny[$usertime[$i]->id])) 
                            @foreach ($usernanny[$usertime[$i]->id] as $nanny)
                                <tr>
                                    <td>{{ $nanny->childname }}</td>
                                    <td>{{ $nanny->childage }}</td>
                                    <td>{{ $nanny->childgender }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">No children listed.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="d-grid gap-2">
                    {{-- <a href="#" class="btn btn-outline-secondary">Book</a> --}}
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('propindex.build', ['id' => $users[$i]->id, 'tid' => $usertime[$i]->id]) }}" class="btn btn-primary">Make Proposal</a>
            </div>
        </div>
    @endif
@endfor

    @endif
</div>
@endsection
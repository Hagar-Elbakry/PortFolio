<div class="card shadow border-0 rounded-4 mb-5">
    <div class="card-body p-5">
        <div class="row align-items-center gx-5">
            <div class="col text-center text-lg-start mb-4 mb-lg-0">
                <div class="bg-light p-4 rounded-4">
                    <div class="text-primary fw-bolder mb-2">{{$experience->start_year}} - {{$experience->end_year}}</div>
                    <div class="small fw-bolder">{{$experience->name}}</div>
                    <div class="small text-muted">{{$experience->company}}</div>
                    <div class="small text-muted">{{$experience->location}}</div>
                </div>
            </div>
            <div class="col-lg-8"><div>{{$experience->description}}</div></div>
        </div>
    </div>
</div>

<div class="page-header mb-2">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle"> {{ $subtitle ?? '' }} </div>
            <h2 class="page-title"> {{ $title ?? '' }} </h2>
        </div>
        <div class="col-auto ms-auto">
            {{ $slot ?? '' }}
        </div>
    </div>
</div>

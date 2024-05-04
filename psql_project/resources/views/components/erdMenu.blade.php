<div>
    <div class="row">
        <button type="button" class="btn btn-sm btn-secondary" onclick="window.location='{{ url('/') }}'">
            <em id="back-button" class="fas fa-arrow-left" style="color: white;"></em>
        </button>
    </div>
</div>
<div>

</div>
<div class="row">
    <span style="font-weight: bold;">Database Name:</span>
    <span>&nbsp;&nbsp; {{request('db_name')}}
    </span>
</div>
<div class="row">
    <span style="height: 20px; width: 20px; background-color:red;"></span>
    <span>&nbsp;&nbsp; Primary Key</span>
</div>
<div class="row">
    <span style="height: 20px; width: 20px; background-color:purple;"></span>
    <span>&nbsp;&nbsp; Foreign Key</span>
</div>
<div class="row">
    <span style="height: 20px; width: 20px; background-color:blue;"></span>
    <span>&nbsp;&nbsp; Fields</span>
</div>
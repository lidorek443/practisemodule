<div>
    <h6 style="padding:20px; background-color: #F8F9FA">Databases</h6>
    <!-- Task 2: Add your code below -->
    @foreach($dbs as $db)
        <ul style="font-weight:bold;" id="{{$db->datname}}" class="showTables"><a>{{$db->datname}}</a>
        </ul>
    @endforeach
</div>

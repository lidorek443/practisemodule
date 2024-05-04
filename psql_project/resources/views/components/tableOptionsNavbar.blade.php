<nav class="navbar navbar-expand navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class=" db-nav-dropdown" style="margin-right: 5px; margin-top: -17px; visibility: hidden;">
            <span class="nav-link text-center" style="margin-top: 5px"><small>[DB]</small></span>
            <div class="dropdown show">
                <a class="dropdown-toggle btn btn-sm btn-secondary db-name-nav" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item createTable" href="#"> <small>Create Table</small> </a>
                </div>
            </div>
        </div>
        <div class="table-nav-dropdown" style="margin-top: -15px; visibility: hidden;">
            <span class="nav-link text-center" style="margin-top: 5px"><small>[Table]</small></span>
            <div class="dropdown show" style=" padding: 2px;">
                <a class="dropdown-toggle btn btn-sm btn-secondary table-name-nav" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item addTableCol" href="#"> <small>Add New Column</small> </a>
                    <a class="dropdown-item addForeignKey" href="#"> <small>Add Foreign Key</small> </a>
                    <a class="dropdown-item dropTable" href="#"> <small>Drop Table</small> </a>
                </div>
            </div>
        </div>
    </div>
    <div style="float: right; color: white;" class="row">
        <a id="showErdBtn" class="nav-link btn btn-secondary" style="visibility:hidden; margin-top: 1px; margin-left: 5px; margin-right: 30px; margin-bottom: 1px;" onclick="showErdDiagram()">Show ERD</a>
    </div>
</nav>

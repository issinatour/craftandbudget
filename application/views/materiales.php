<?php
echo "powered By Nicolas Alphonse &copy;";
?>

<div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Editable Table in- combination with jEditable</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: block;">
            <div class="">
            <a onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Add a new row</a>
            </div>
            <div id="editable_wrapper" class="dataTables_wrapper form-inline"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="editable_length"><label><select name="editable_length" aria-controls="editable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-sm-6"><div id="editable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="editable"></label></div></div></div><table class="table table-striped table-bordered table-hover  dataTable" id="editable" role="grid" aria-describedby="editable_info">
            <thead>
            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 298px;" aria-sort="ascending">Rendering engine</th><th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 401px;">Browser</th><th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 364px;">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 256px;">Engine version</th><th class="sorting" tabindex="0" aria-controls="editable" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 183px;">CSS grade</th></tr>
            </thead>
            <tbody>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <tr role="row" class="odd"><td class="sorting_1">Custom row</td><td>New row</td><td>New row</td><td>New row</td><td>New row</td></tr><tr class="gradeA even" role="row">
                <td class="sorting_1">Gecko</td>
                <td>Firefox 1.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td class="center">1.7</td>
                <td class="center">A</td>
            </tr><tr class="gradeA odd" role="row">
                <td class="sorting_1">Gecko</td>
                <td>Firefox 1.5</td>
                <td>Win 98+ / OSX.2+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr><tr class="gradeA even" role="row">
                <td class="sorting_1">Gecko</td>
                <td>Firefox 2.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr><tr class="gradeA odd" role="row">
                <td class="sorting_1">Gecko</td>
                <td>Firefox 3.0</td>
                <td>Win 2k+ / OSX.3+</td>
                <td class="center">1.9</td>
                <td class="center">A</td>
            </tr><tr class="gradeA even" role="row">
                <td class="sorting_1">Gecko</td>
                <td>Camino 1.0</td>
                <td>OSX.2+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr><tr class="gradeA odd" role="row">
                <td class="sorting_1">Gecko</td>
                <td>Camino 1.5</td>
                <td>OSX.3+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr><tr class="gradeA even" role="row">
                <td class="sorting_1">Gecko</td>
                <td>Netscape 7.2</td>
                <td>Win 95+ / Mac OS 8.6-9.2</td>
                <td class="center">1.7</td>
                <td class="center">A</td>
            </tr><tr class="gradeA odd" role="row">
                <td class="sorting_1">Gecko</td>
                <td>Netscape Browser 8</td>
                <td>Win 98SE+</td>
                <td class="center">1.7</td>
                <td class="center">A</td>
            </tr><tr class="gradeA even" role="row">
                <td class="sorting_1">Gecko</td>
                <td>Netscape Navigator 9</td>
                <td>Win 98+ / OSX.2+</td>
                <td class="center">1.8</td>
                <td class="center">A</td>
            </tr></tbody>
            <tfoot>
            <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
            </tfoot>
            </table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="editable_info" role="status" aria-live="polite">Showing 1 to 10 of 58 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="editable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">2</a></li><li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">3</a></li><li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">4</a></li><li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">5</a></li><li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">6</a></li><li class="paginate_button next" aria-controls="editable" tabindex="0" id="editable_next"><a href="#">Next</a></li></ul></div></div></div></div>

            </div>
            </div>
           @extends('dashboard.layouts.app')

           @section('container')
               <div><a class="btn btn-link" role="button" id="menu-toggle-L" href="#menu-toggle-L"><i
                           class="fa fa-bars icon-sidebar-L"></i></a>
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col">
                               <h5 class="text-black-50 float-left judul-header">Data Prosesor</h5><a
                                   class="btn btn-sm float-right smsp-button" role="button" href="setup_Prosesor.html"><i
                                       class="fa fa-pencil-square-o"></i>&nbsp; Add Data Prosesor</a>
                           </div>
                       </div>
                       <form class="form-clean">
                           <div class="form-row">
                               <div class="col">
                                   <div class="table-responsive text-black-50 shadow-sm">
                                       <table class="table table-striped table-hover table-bordered table-sm">
                                           <thead>
                                               <tr class="table-secondary text-center text-black-50">
                                                   <th class="border rounded-0 border-secondary judul-header">No</th>
                                                   <th class="border rounded-0 border-secondary judul-header">Brand
                                                   </th>
                                                   <th class="border rounded-0 border-secondary judul-header">Jumlah Core
                                                   </th>
                                                   <th class="border rounded-0 border-secondary judul-header">Actions</th>
                                               </tr>
                                           </thead>
                                           <tbody class="text-body">
                                               <tr>
                                                   <td class="text-center text-body">1</td>
                                                   <td class="text-body">Cell 2</td>
                                                   <td class="text-body">Cell 3</td>
                                                   <td class="text-center"><a class="smsp-icon-edit" href="#"><i
                                                               class="fa fa-pencil-square-o"></i></a><a
                                                           class="smsp-icon-delete" href="#"><i
                                                               class="fa fa-trash"></i></a>
                                                   </td>
                                               </tr>
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
               @include('dashboard.prosesor.add') {{-- Modal Add RAM --}}
               @include('dashboard.prosesor.edit') {{-- Modal Edit RAM --}}
               @include('dashboard.prosesor.delete') {{-- Modal Delete RAM --}}
           @endsection

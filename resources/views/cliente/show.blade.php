<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        
        <title>Nuvola</title>

    </head>
    <script type="text/javascript">
    	$(document).ready(function() {
    	$('#datatable-perfil').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
               "order": [[ 1, "desc" ]],
              "info": true,
              "autoWidth": true,
              "responsive": true,
              // Botones para exportar a excel, pdf u otro
              dom: 'Blfrtip',buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                // Botones para mostar numero de registros
              "lengthMenu": [[10,30,50,80,100,120, -1], [10,30,50,80,100,120, "All"]]
                            });
     });	
    </script>
     <!-- Main content -->
      <section class="content" style="padding-top: 25px;">
        <div class="container-fluid">
        <div class="row">
          

           <div class="right_col" role="main" style="width: 100%;" >
          <div class="">     

                      <div class="row">   
                    
                          <div class="col-2">
                          </div> 

                          <div class="col-8">

                             <div class="card card-default" style="border-top: 3px  solid #3c8dbc; !important;">
                                 <div class="card-header"  style="font-weight: bold">
                                    LISTA DE VIAJES
                              </div>

                              <div class="card-body">

                                   <div class="row">
                                      <div class="col-12"> 

                                         <div class="form-group row">
                                          
                                             <div class="col-sm-8" style="text-align: left;">
                                               <img width="200" height="180" src="{{asset($cliente->foto)}}" />
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                               <label class="col-sm-3 col-form-label" style="font-weight: bold">Nombre </label>
                                               <div class="col-sm-5">
                                                  {{$cliente->nombre}}
                                               </div>
                                          </div>


                                          <div class="form-group row">
                                             <label class="col-sm-3 col-form-label" style="font-weight: bold">Apellidos</label>
                                             <div class="col-sm-5">
                                                 {{$cliente->apellidos}}
                                             </div>
                                          </div>

                                          <div class="form-group row">
                                               <label class="col-sm-3 col-form-label" style="font-weight: bold">Email </label>
                                               <div class="col-sm-5">
                                                  {{$cliente->email}}
                                               </div>
                                          </div>

                                          <div class="form-group row">
                                              <label class="col-sm-3 col-form-label" style="font-weight: bold">Dirección</label>
                                              <div class="col-sm-5">
                                                 {{$cliente->direccion}}
                                              </div>
                                          </div>

                                          <div class="form-group row">
                                              <label class="col-sm-3 col-form-label" style="font-weight: bold">Teléfono</label>
                                              <div class="col-sm-5">
                                                 {{$cliente->telefono}}
                                              </div>
                                          </div>
                                        </div>
                                   </div>
                               </div> 
                            </div>
                        </div>
                        <div class="col-2">
                        </div> 
                     </div>   
                     <br>  


                <div class="row">   
                    
                  <div class="col-2">
                  </div> 

                  <div class="col-8">    


                  <div class="card card-default" style="border-top: 3px  solid #3c8dbc; !important;">
                      <div class="card-header"  style="font-weight: bold">
                         LISTA DE VIAJES
                      </div>
                

                    <div class="row">
                        <div class="col-12">
                           <div class="table-responsive">
                             <table class="table table-striped">
                                <thead>
                                  <tr>
                                     <th>
                                        Fecha Viaje
                                     </th>
                                     <th>
                                        Pais
                                     </th>
                                     <th>
                                        Ciudad 
                                     </th> 
                                  </tr>  
                                </thead>
                                <tbody>
                                  @foreach ($cliente->listaviaje as $category)
                                    <tr>
                                      <td>
                                        {{ $category->fecha_viaje }}
                                      </td>  
                                      <td>
                                        {{ $category->pais }}
                                      </td>
                                      <td>
                                        {{ $category->ciudad }}
                                      </td>  
                                    </tr>  
                                @endforeach  
                                </tbody>
                             </table> 
                           </div> 
                        </div>  
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-12" style="text-align: right;">
                        <a href="{{route('cliente.index')}}" class="btn btn-danger btn-sm">Regresar&nbsp;<span class="fa fa-window-close"></span></a>
                         &nbsp;
                      </div>  
                    </div>
                    <br>

                   </div> 
                  </div>
                  <div class="col-2">
                  </div>
                 </div>    
                  

                  </div>
                </div>
              </div>
     
        </div>
     
    
</section>
</body>
</html>        
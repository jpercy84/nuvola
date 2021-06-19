<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
          

           <div class="right_col" role="main" style="width: 100%" !important>
           <div class="row">

           
           <div class="col-2">
           </div> 		

           <div class="col-8">

            <div class="card card-default" style="border-top: 3px  solid #3c8dbc; !important;">
                       <div class="card-header"  style="font-weight: bold">
                              LISTA DE CLIENTES
                        </div>


                  <div class="card-body">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive" id="contenido">
                   
                            <table id="datatable-perfil" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                <tr >
                                  <th>Nombre</th>
                                  <th>Apellidos</th>
                                  <th>Email</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                              
                              <tbody id="lista" class="buscar">
                              	<?php $i=0; ?>
                              	@foreach ($clientes as $cliente)
                              	<?php $i = $i + 1 ?>
                                 <tr id="cliente{{$i}}">
                                 	<td>{{$cliente->nombre}}</td>
                                 	<td>{{$cliente->apellidos}}</td>
                                 	<td>{{$cliente->email}}</td>
                                 	<td>
                                 		<a href="{{route('cliente.show',Crypt::encrypt($cliente->email))}}" class="btn btn-primary">Detalle</a>  |
                                 		
                                 		<a  onclick="eliminar_cliente('{{$cliente->email}}','{{$i}}')" class="btn btn-danger">Eliminar</a>
                                 		
                                 		
                                 	
                                 	</td>
                                 </tr>	
                              	@endforeach
                              </tbody>
                              
                            </table>
                        </div>
                  </div>
              </div>
             	
            </div>
          </div> 
         </div> 
         <div class="col-2">
         </div> 	    
     
        </div>
      </div>
     
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    
</section>
<script type="text/javascript">
	

function eliminar_cliente(email,cont){
	
    emailcliente = email;
    swal({
        title: "ESTAS SEGURO?",
        text: "UNA VEZ BORRADO NO PUEDE RECUPERARSE!",
        icon: "warning",
        buttons: ["CANCELAR", "ELIMINAR"],
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: "/api/delete/"+emailcliente,
                data: {
                	_method: 'DELETE',
                    emailcliente
                },
                success: function (data) {
                   //console.log(data)
                    //const res = JSON.parse(data)
                    
                    if(data.codaccion == '02'){
                        //console.error(res.error)
                        swal("EL CLIENTE NO PUDO SER ELIMINADO!", {
                            icon: "error",
                            timer: 3000
                        })
                    }else{
                        //$(`#cliente${emailcliente}`).remove()

                        $("#cliente"+cont).remove();
                        //$('#cliente${emailcliente}').remove()

                        swal("CLIENTE ELIMINADO!", {
                            icon: "success",
                            timer: 3000,
                        })
                        
                    }
                },
                error: function (e) {
                    //console.error(`Error: ${e}`)
                }
            })
        }
    })
}

function show_cliente(email){
	
    emailcliente = email;
   
            $.ajax({
                type: "GET",
                url: "/api/show/"+emailcliente,
                data: {
                    emailcliente
                },
                success: function (data) {

                	console.log(data)
                   //console.log(data)
                    //const res = JSON.parse(data)
                    
                    if(data.codaccion == '02'){
                        //console.error(res.error)
                        swal("EL CLIENTE NO PUDO SER ELIMINADO!", {
                            icon: "error",
                            timer: 3000
                        })
                    }else{
                        //$(`#cliente${emailcliente}`).remove()

                        //$("#cliente"+cont).remove();
                        //$('#cliente${emailcliente}').remove()

                        swal("CLIENTE ELIMINADO!", {
                            icon: "success",
                            timer: 3000,
                        })
                        
                    }
                },
                error: function (e) {
                    //console.error(`Error: ${e}`)
                }
         })
}

</script>
</body>
</html>        
<?php

class MesaApi 
{
    // public function CargarMesa($request, $response, $args)
    // {
    //     $codigo = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 3)), 0, 5);
    //     try
    //     {
    //         $mesa = new App\Models\Mesa;
    //         $mesa->codigo = $codigo;
    //         $mesa->save();
    //         $respuesta = array("Mensaje" => "La mesa se registro correctamente", "Codigo" => $codigo);
    //     }
    //     catch(Exception $e)
    //     {
    //         $mensaje = $e->getMessage();
    //         $respuesta = array("Estado" => "ERROR", "Mensaje" => "$mensaje");
    //     }

    //     return $response->withJson($respuesta,200);
    // } 

    // public function CambiarEstadoClienteEsperandoPedido($request, $response, $args)
    // {
    //     $parametros = $request->getParsedBody();
    //     $codigo = $parametros['codigo'];
    //     $mesa = new App\Models\Mesa;
    //     $pedido = new App\Models\Pedido;
    //     try
    //     {
    //         $mesaActual = $mesa->where('codigo', '=', $codigo)->first();

    //         if(!$mesaActual->id_estado)
    //         {
    //             $pedido->where('id_mesa', '=', $mesaActual->id)
    //             ->whereNull('id_estadoMesa')
    //             ->update(['id_estadoMesa' => 1]);
    //             $mesaActual->id_estado = 1;
    //             $mesaActual->save();
    //             $mensaje = array("Mensaje" => "OK", "Estado" => "Mesa " . $mesaActual->id . " con clientes esperando el pedido");
    //         }
    //         else
    //         {
    //             $mensaje = array("Estado" => "ERROR", "Mensaje" => "La mesa ya tiene un estado asignado");
    //         }
    //     }
    //     catch(Exception $e)
    //     {
    //         $msj = $e->getMessage();
    //         $mensaje = array("Estado" => "ERROR", "Mensaje" => $msj);
    //     }

    //     return $response->withJson($mensaje, 200);
    // }

    // public function CambiarEstadoClienteComiendo($request, $response, $args)
    // {
    //     $parametros = $request->getParsedBody();
    //     $codigo = $parametros['codigo'];
    //     $mesa = new App\Models\Mesa;
    //     $pedido = new App\Models\Pedido;
    //     try
    //     {
    //         $mesaActual = $mesa->where('codigo', '=', $codigo)->first();

    //         if($mesaActual->id_estado == 1)
    //         {
    //             $pedido->where('id_mesa', '=', $mesaActual->id)
    //             ->where('id_estadoMesa', '=', 1)
    //             ->update(['id_estadoMesa' => 2]);

    //             $mesaActual->id_estado = 2;
    //             $mesaActual->save();
    //             $mensaje = array("Mensaje" => "OK", "Estado" => "Mesa " . $mesaActual->id . " con clientes comiendo");
    //         }
    //         else
    //         {
    //             $mensaje = array("Estado" => "ERROR", "Mensaje" => "La mesa ya tiene clientes comiendo");
    //         }
    //     }
    //     catch(Exception $e)
    //     {
    //         $msj = $e->getMessage();
    //         $mensaje = array("Estado" => "ERROR", "Mensaje" => $msj);
    //     }

    //     return $response->withJson($mensaje, 200);
    // }

    // public function CambiarEstadoClientePagando($request, $response, $args)
    // {
    //     $parametros = $request->getParsedBody();
    //     $codigo = $parametros['codigo'];
    //     $mesa = new App\Models\Mesa;
    //     $pedido = new App\Models\Pedido;
    //     try
    //     {
    //         $mesaActual = $mesa->where('codigo', '=', $codigo)->first();

    //         if($mesaActual->id_estado == 2)
    //         {
    //             $pedidosMesaActual = $pedido->join('productos', 'pedidos.id_producto', '=', 'productos.id')  
    //             ->where('pedidos.id_mesa', '=', $mesaActual->id)
    //             ->where('pedidos.id_estadoMesa', '=', 2)->get();
                
    //             $totalFactura = 0;

    //             for($i = 0; $i < count($pedidosMesaActual); $i++)
    //             {
    //                 $totalFactura += $pedidosMesaActual[$i]->precio * $pedidosMesaActual[$i]->cantidad;
    //             }

    //             $factura = new App\Models\Factura;
    //             date_default_timezone_set("America/Argentina/Buenos_Aires");
    //             $fecha = date('Y-m-d');

    //             $factura->id_mesa = $mesaActual->id;
    //             $factura->total = $totalFactura;
    //             $factura->fecha = $fecha;
    //             $factura->save();

    //             $pedido->where('id_mesa', '=', $mesaActual->id)
    //             ->where('id_estadoMesa', '=', 2)
    //             ->update(['id_estadoMesa' => 3]);

    //             $mesaActual->id_estado = 3;
    //             $mesaActual->save();
    //             $mensaje = array("Mensaje" => "OK", "Estado" => "Mesa " . $mesaActual->id . " con clientes pagando");
    //         }
    //         else
    //         {
    //             $mensaje = array("Estado" => "ERROR", "Mensaje" => "Los clientes ya estan pagando su pedido");
    //         }
    //     }
    //     catch(Exception $e)
    //     {
    //         $msj = $e->getMessage();
    //         $mensaje = array("Estado" => "ERROR", "Mensaje" => $msj);
    //     }

    //     return $response->withJson($mensaje, 200);
    // }

    // public function CambiarEstadoCerrada($request, $response, $args)
    // {
    //     $parametros = $request->getParsedBody();
    //     $codigo = $parametros['codigo'];
    //     $mesa = new App\Models\Mesa;
    //     $pedido = new App\Models\Pedido;

    //     try
    //     {
    //         $mesaActual = $mesa->where('codigo', '=', $codigo)->first();

    //         if($mesaActual->id_estado == 3)
    //         {
    //             $pedido->where('id_mesa', '=', $mesaActual->id)
    //             ->where('id_estadoMesa', '=', 3)
    //             ->update(['id_estadoMesa' => 4]);

    //             $mesaActual->id_estado = 4;
    //             $mesaActual->save();
    //             $mensaje = array("Mensaje" => "OK", "Estado" => "Mesa " . $mesaActual->id . " cerrada");
    //         }
    //         else
    //         {
    //             $mensaje = array("Estado" => "ERROR", "Mensaje" => "La mesa ya fue cerrada. Estado incorrecto");
    //         }
    //     }
    //     catch(Exception $e)
    //     {
    //         $msj = $e->getMessage();
    //         $mensaje = array("Estado" => "ERROR", "Mensaje" => $msj);
    //     }

    //     return $response->withJson($mensaje, 200);
    // }

    // public function LaMasUsada($request, $response, $args)
    // {
    //     $fecha = $_GET['fecha'];
    //     $fecha_desde = $_GET['fecha_desde'];
    //     $fecha_hasta = $_GET['fecha_hasta'];
    //     $pedido = new App\Models\Pedido;

    //     if($fecha != 0)
    //     {         
    //         $fecha = strtotime($fecha);
    //         $fecha = date('Y-m-d H:i:s' , $fecha); 

    //         $mesasUsadasDao = $pedido->orderBy('id_mesa')
    //         ->where('fecha', '=', $fecha)
    //         ->select('id_mesa')->get();

    //         MesaApi::BuscarMesaMasUsada($mesasUsadasDao);   

    //     }
    //     else
    //     {
    //         $fecha_desde = strtotime($fecha_desde);
    //         $fecha_desde = date('Y-m-d H:i:s' , $fecha_desde);  
    //         $fecha_hasta = strtotime($fecha_hasta);
    //         $fecha_hasta = date('Y-m-d H:i:s' , $fecha_hasta);

    //         $mesasUsadasDao = $pedido->orderBy('id_mesa')
    //         ->where('fecha', '>=', $fecha_desde)
    //         ->where('fecha', '<=', $fecha_hasta)
    //         ->select('id_mesa')->get();

    //         MesaApi::BuscarMesaMasUsada($mesasUsadasDao);
    //     }
    // }

    // public function LaMenosUsada($request, $response, $args)
    // {
    //     $fecha = $_GET['fecha'];
    //     $fecha_desde = $_GET['fecha_desde'];
    //     $fecha_hasta = $_GET['fecha_hasta'];
    //     $pedido = new App\Models\Pedido;
    //     $mesa = new App\Models\Mesa;
    //     $mesas = $mesa->all();
    //     $idMesas = [];

    //     for($i = 0; $i < count($mesas); $i++)
    //     {
    //         $idMesas[] = $mesas[$i]->id;
    //     }

    //     if($fecha != 0)
    //     {         
    //         $fecha = strtotime($fecha);
    //         $fecha = date('Y-m-d H:i:s' , $fecha); 

    //         $mesasUsadasDao = $pedido->orderBy('id_mesa')
    //                                 ->where('fecha', '=', $fecha)
    //                                 ->select('id_mesa')->get();

    //         $mesasUsadas = [];
    //         $mesaMenosUsada = -1;
        
    //         for($i = 0; $i < count($mesasUsadasDao); $i++)
    //         {
    //             $mesasUsadas[] = $mesasUsadasDao[$i]->id_mesa;
    //         } 
            
    //         //Recorro todas las mesas existentes para ver si alguna no se utilizo
    //         for($i = 0; $i < count($idMesas); $i++)
    //         {
    //             $mesaUsada = false;

    //             for($j = 0; $j < count($mesasUsadas); $j++)
    //             {
    //                 if($idMesas[$i] == $mesasUsadas[$j])
    //                 {
    //                     $mesaUsada = true;
    //                     break;
    //                 }
    //             }
    //             if(!$mesaUsada)
    //             {
    //                 $mesaMenosUsada = $idMesas[$i];
    //                 break;
    //             }
    //         }

    //         if($mesaMenosUsada == -1)
    //         {
    //             $mesaMenosUsada = MesaApi::BuscarMesaMenosUsada($mesasUsadasDao, $mesasUsadas);
    //             echo "Mesa menos usada: " . $mesaMenosUsada['id'] . "\n" . "Cantidad de veces: " . $mesaMenosUsada['cantidad'];
    //         }
    //         else
    //             echo "Mesa menos usada: " . $mesaMenosUsada . "\n" . "Cantidad de veces: 0";               

    //     }
    //     else
    //     {
    //         $fecha_desde = strtotime($fecha_desde);
    //         $fecha_desde = date('Y-m-d H:i:s' , $fecha_desde);  
    //         $fecha_hasta = strtotime($fecha_hasta);
    //         $fecha_hasta = date('Y-m-d H:i:s' , $fecha_hasta);

            
    //         $mesasUsadasDao = $pedido->orderBy('id_mesa')
    //         ->where('fecha', '>=', $fecha_desde)
    //         ->where('fecha', '<=', $fecha_hasta)
    //         ->select('id_mesa')->get();

    //         $mesasUsadas = [];
    //         $mesaMenosUsada = -1;
        
    //         for($i = 0; $i < count($mesasUsadasDao); $i++)
    //         {
    //             $mesasUsadas[] = $mesasUsadasDao[$i]->id_mesa;
    //         } 
            
    //         for($i = 0; $i < count($idMesas); $i++)
    //         {
    //             $mesaUsada = false;

    //             for($j = 0; $j < count($mesasUsadas); $j++)
    //             {
    //                 if($idMesas[$i] == $mesasUsadas[$j])
    //                 {
    //                     $mesaUsada = true;
    //                     break;
    //                 }
    //             }
    //             if(!$mesaUsada)
    //             {
    //                 $mesaMenosUsada = $idMesas[$i];
    //                 break;
    //             }
    //         }

    //         if($mesaMenosUsada == -1)
    //         {
    //             $mesaMenosUsada = MesaApi::BuscarMesaMenosUsada($mesasUsadasDao, $mesasUsadas);
    //             echo "Mesa menos usada: " . $mesaMenosUsada['id'] . "\n" . "Cantidad de veces: " . $mesaMenosUsada['cantidad'];
    //         }
    //         else
    //             echo "Mesa menos usada: " . $mesaMenosUsada . "\n" . "Cantidad de veces: 0";               

    //     }
    // }

    // public function LaQueMasFacturo($request, $response, $args)
    // {
    //     $fecha = $_GET['fecha'];
    //     $fecha_desde = $_GET['fecha_desde'];
    //     $fecha_hasta = $_GET['fecha_hasta'];
    //     $factura = new App\Models\Factura;

    //     if($fecha != 0)
    //     {         
    //         $fecha = strtotime($fecha);
    //         $fecha = date('Y-m-d H:i:s' , $fecha); 

    //         try
    //         {
    //             $mesaFacturacion = $factura->where('fecha', '=', $fecha)
    //                                        ->selectRaw('id_mesa as id, SUM(total) as total')
    //                                        ->groupBy('id_mesa')->get();
    
    //             $facturacion = 0; 
    
    //             if(count($mesaFacturacion) > 0)
    //             {
    //                 for($i = 0; $i < count($mesaFacturacion); $i++)
    //                 {
    //                     if($mesaFacturacion[$i]->total > $facturacion)
    //                     {
    //                         $facturacion = $mesaFacturacion[$i]->total;
    //                         $respuesta = array("Mesa: " => $mesaFacturacion[$i]->id, "Facturacion: " => "$" . $facturacion);
    //                     }
    //                 }
    //             }
    //             else
    //                 $respuesta = array("Estado: " => "Error", "Mensaje: " => "No hubo movimientos");
    
    //         }
    //         catch(Exception $e)
    //         {
    //             $mensaje = $e->getMessage();
    //             $respuesta = array("Estado: " => "Error", "Mensaje: " => $mensaje);
    //         }
    //     }
    //     else
    //     {
    //         $fecha_desde = strtotime($fecha_desde);
    //         $fecha_desde = date('Y-m-d H:i:s' , $fecha_desde);  
    //         $fecha_hasta = strtotime($fecha_hasta);
    //         $fecha_hasta = date('Y-m-d H:i:s' , $fecha_hasta);

    //         try
    //         {
    //             $mesaFacturacion = $factura->where('fecha', '>=', $fecha_desde)
    //                                        ->where('fecha', '<=', $fecha_hasta)
    //                                        ->selectRaw('id_mesa as id, SUM(total) as total')
    //                                        ->groupBy('id_mesa')->get();
    
    //             $facturacion = 0; 
    
    //             if(count($mesaFacturacion) > 0)
    //             {
    //                 for($i = 0; $i < count($mesaFacturacion); $i++)
    //                 {
    //                     if($mesaFacturacion[$i]->total > $facturacion)
    //                     {
    //                         $facturacion = $mesaFacturacion[$i]->total;
    //                         $respuesta = array("Mesa: " => $mesaFacturacion[$i]->id, "Facturacion: " => "$" . $facturacion);
    //                     }
    //                 }
    //             }
    //             else
    //                 $respuesta = array("Estado: " => "Error", "Mensaje: " => "No hubo movimientos");
    
    //         }
    //         catch(Exception $e)
    //         {
    //             $mensaje = $e->getMessage();
    //             $respuesta = array("Estado: " => "Error", "Mensaje: " => $mensaje);
    //         }
    //     }
        
    //     return $response->withJson($respuesta, 200);
    // }

    // public function LaQueMenosFacturo($request, $response, $args)
    // {
    //     $fecha = $_GET['fecha'];
    //     $fecha_desde = $_GET['fecha_desde'];
    //     $fecha_hasta = $_GET['fecha_hasta'];
    //     $factura = new App\Models\Factura;
    //     $mesa = new App\Models\Mesa;
    //     $mesas = $mesa->all();
    //     $idMesas = [];

    //     for($i = 0; $i < count($mesas); $i++)
    //     {
    //         $idMesas[] = $mesas[$i]->id;
    //     }

    //     if($fecha != 0)
    //     {         
    //         $fecha = strtotime($fecha);
    //         $fecha = date('Y-m-d H:i:s' , $fecha); 

    //         try
    //         {                
    //             $mesasFacturacion = $factura->where('fecha', '=', $fecha)
    //                                        ->selectRaw('id_mesa as id, SUM(total) as total')
    //                                        ->groupBy('id_mesa')->get();

    //             $mesaSinFacturacion = -1;                           

    //             //Recorro todas las mesas existentes para ver si alguna no se utilizo
    //             for($i = 0; $i < count($idMesas); $i++)
    //             {
    //                 $mesaUsada = false;

    //                 for($j = 0; $j < count($mesasFacturacion); $j++)
    //                 {
    //                     if($idMesas[$i] == $mesasFacturacion[$j]->id)
    //                     {
    //                         $mesaUsada = true;
    //                         break;
    //                     }
    //                 }
    //                 if(!$mesaUsada)
    //                 {
    //                     $mesaSinFacturacion = $idMesas[$i];
    //                     break;
    //                 }
    //             }  
                
    //             if($mesaSinFacturacion == -1)
    //             {
    //                 $facturacion = 999999999999; 
    
    //                 if(count($mesasFacturacion) > 0)
    //                 {
    //                     for($i = 0; $i < count($mesasFacturacion); $i++)
    //                     {
    //                         if($mesasFacturacion[$i]->total < $facturacion)
    //                         {
    //                             $facturacion = $mesasFacturacion[$i]->total;
    //                             $respuesta = array("Mesa: " => $mesasFacturacion[$i]->id, "Facturacion: " => "$" . $facturacion);
    //                         }
    //                     }
    //                 }
    //                 else
    //                     $respuesta = array("Mesa: " => "n/a", "Mensaje: " => "No hubo movimientos");
    //             }
    //             else
    //                 $respuesta = array("Mesa: " => $mesaSinFacturacion, "Mensaje: " => "Sin facturacion");
    //         }
    //         catch(Exception $e)
    //         {
    //             $mensaje = $e->getMessage();
    //             $respuesta = array("Estado: " => "Error", "Mensaje: " => $mensaje);
    //         }
    //     }
    //     else
    //     {
    //         $fecha_desde = strtotime($fecha_desde);
    //         $fecha_desde = date('Y-m-d H:i:s' , $fecha_desde);  
    //         $fecha_hasta = strtotime($fecha_hasta);
    //         $fecha_hasta = date('Y-m-d H:i:s' , $fecha_hasta);

    //         try
    //         {                
    //             $mesasFacturacion = $factura->where('fecha', '>=', $fecha_desde)
    //                                         ->where('fecha', '<=', $fecha_hasta)
    //                                         ->selectRaw('id_mesa as id, SUM(total) as total')
    //                                         ->groupBy('id_mesa')->get();

    //             $mesaSinFacturacion = -1;                           

    //             //Recorro todas las mesas existentes para ver si alguna no se utilizo
    //             for($i = 0; $i < count($idMesas); $i++)
    //             {
    //                 $mesaUsada = false;

    //                 for($j = 0; $j < count($mesasFacturacion); $j++)
    //                 {
    //                     if($idMesas[$i] == $mesasFacturacion[$j]->id)
    //                     {
    //                         $mesaUsada = true;
    //                         break;
    //                     }
    //                 }
    //                 if(!$mesaUsada)
    //                 {
    //                     $mesaSinFacturacion = $idMesas[$i];
    //                     break;
    //                 }
    //             }  
                
    //             if($mesaSinFacturacion == -1)
    //             {
    //                 $facturacion = 999999999999; 
    
    //                 if(count($mesasFacturacion) > 0)
    //                 {
    //                     for($i = 0; $i < count($mesasFacturacion); $i++)
    //                     {
    //                         if($mesasFacturacion[$i]->total < $facturacion)
    //                         {
    //                             $facturacion = $mesasFacturacion[$i]->total;
    //                             $respuesta = array("Mesa: " => $mesasFacturacion[$i]->id, "Facturacion: " => "$" . $facturacion);
    //                         }
    //                     }
    //                 }
    //                 else
    //                     $respuesta = array("Mesa: " => "Sin informacion", "Mensaje: " => "No hubo movimientos");
    //             }
    //             else
    //                 $respuesta = array("Mesa: " => $mesaSinFacturacion, "Mensaje: " => "Sin facturacion");
    //         }
    //         catch(Exception $e)
    //         {
    //             $mensaje = $e->getMessage();
    //             $respuesta = array("Estado: " => "Error", "Mensaje: " => $mensaje);
    //         }
    //     }
    //     return $response->withJson($respuesta, 200);
    // }

    // public function FacturaMayorImporte($request, $response, $args)
    // {
    //     $fecha = $_GET['fecha'];
    //     $fecha_desde = $_GET['fecha_desde'];
    //     $fecha_hasta = $_GET['fecha_hasta'];
    //     $factura = new App\Models\Factura;
    //     $respuesta;

    //     try
    //     {
    //         if($fecha != 0)
    //         {         
    //             $fecha = strtotime($fecha);
    //             $fecha = date('Y-m-d H:i:s' , $fecha);
                
    //             $facturasMayorImporte = $factura->where('fecha', '=', $fecha)
    //                                             ->selectRaw( 'id_mesa, Max(total) as "mayorImporte"')
    //                                             ->groupBy('id_mesa')->get();

    //             $importeMayor = 0;

    //             if(count($facturasMayorImporte) > 0)
    //             {
    //                 for($i = 0; $i < count($facturasMayorImporte); $i++)
    //                 {
    //                     if($facturasMayorImporte[$i]->mayorImporte > $importeMayor)
    //                     {
    //                         $importeMayor = $facturasMayorImporte[$i]->mayorImporte;
    //                         $respuesta = array("Mesa" => $facturasMayorImporte[$i]->id_mesa, "Importe" => $importeMayor);
    //                     }
    //                 }
    //             }
    //             else
    //             {
    //                 $respuesta = array("Mesa" => "Sin informacion", "Importe" => "No hubo facturacion");
    //             }
    //         }
    //         else
    //         {
    //             $fecha_desde = strtotime($fecha_desde);
    //             $fecha_desde = date('Y-m-d H:i:s' , $fecha_desde);  
    //             $fecha_hasta = strtotime($fecha_hasta);
    //             $fecha_hasta = date('Y-m-d H:i:s' , $fecha_hasta);

    //             $facturasMayorImporte = $factura->where('fecha', '>=', $fecha_desde)
    //                                             ->where('fecha', '<=', $fecha_hasta)
    //                                             ->selectRaw( 'id_mesa, Max(total) as "mayorImporte"')
    //                                             ->groupBy('id_mesa')->get();

    //             $importeMayor = 0;

    //             if(count($facturasMayorImporte) > 0)
    //             {
    //                 for($i = 0; $i < count($facturasMayorImporte); $i++)
    //                 {
    //                     if($facturasMayorImporte[$i]->mayorImporte > $importeMayor)
    //                     {
    //                         $importeMayor = $facturasMayorImporte[$i]->mayorImporte;
    //                         $respuesta = array("Mesa" => $facturasMayorImporte[$i]->id_mesa, "Importe" => $importeMayor);
    //                     }
    //                 }
    //             }
    //             else
    //             {
    //                 $respuesta = array("Mesa" => "Sin informacion", "Importe" => "No hubo facturacion");
    //             }
    //         }
    //     }
    //     catch(Exception $e)
    //     {
    //         $mensaje = $e->getMessage();
    //         $respuesta = array("Estado" => "ERROR", "Mensaje" => $mensaje);
    //     }       

    //     return $response->withJson($respuesta, 200);
    // }

    // public function FacturaMenorImporte($request, $response, $args)
    // {
    //     $fecha = $_GET['fecha'];
    //     $fecha_desde = $_GET['fecha_desde'];
    //     $fecha_hasta = $_GET['fecha_hasta'];
    //     $factura = new App\Models\Factura;
    //     $respuesta;

    //     try
    //     {
    //         if($fecha != 0)
    //         {         
    //             $fecha = strtotime($fecha);
    //             $fecha = date('Y-m-d H:i:s' , $fecha);
                
    //             $facturasMenorImporte = $factura->where('fecha', '=', $fecha)
    //                                             ->selectRaw( 'id_mesa, Min(total) as "menorImporte"')
    //                                             ->groupBy('id_mesa')->get();

    //             $importeMenor = 999999999999;

    //             if(count($facturasMenorImporte) > 0)
    //             {
    //                 for($i = 0; $i < count($facturasMenorImporte); $i++)
    //                 {
    //                     if($facturasMenorImporte[$i]->menorImporte < $importeMenor)
    //                     {
    //                         $importeMenor = $facturasMenorImporte[$i]->menorImporte;
    //                         $respuesta = array("Mesa" => $facturasMenorImporte[$i]->id_mesa, "Importe" => $importeMenor);
    //                     }
    //                 }
    //             }
    //             else
    //             {
    //                 $respuesta = array("Mesa" => "Sin informacion", "Importe" => "No hubo facturacion");
    //             }
    //         }
    //         else
    //         {
    //             $fecha_desde = strtotime($fecha_desde);
    //             $fecha_desde = date('Y-m-d H:i:s' , $fecha_desde);  
    //             $fecha_hasta = strtotime($fecha_hasta);
    //             $fecha_hasta = date('Y-m-d H:i:s' , $fecha_hasta);

    //             $facturasMenorImporte = $factura->where('fecha', '>=', $fecha_desde)
    //                                             ->where('fecha', '<=', $fecha_hasta)
    //                                             ->selectRaw( 'id_mesa, Min(total) as "menorImporte"')
    //                                             ->groupBy('id_mesa')->get();

    //             $importeMenor = 999999999999;

    //             if(count($facturasMenorImporte) > 0)
    //             {
    //                 for($i = 0; $i < count($facturasMenorImporte); $i++)
    //                 {
    //                     if($facturasMenorImporte[$i]->menorImporte < $importeMenor)
    //                     {
    //                         $importeMenor = $facturasMenorImporte[$i]->menorImporte;
    //                         $respuesta = array("Mesa" => $facturasMenorImporte[$i]->id_mesa, "Importe" => $importeMenor);
    //                     }
    //                 }
    //             }
    //             else
    //             {
    //                 $respuesta = array("Mesa" => "Sin informacion", "Importe" => "No hubo facturacion");
    //             }
    //         }
    //     }
    //     catch(Exception $e)
    //     {
    //         $mensaje = $e->getMessage();
    //         $respuesta = array("Estado" => "ERROR", "Mensaje" => $mensaje);
    //     }       

    //     return $response->withJson($respuesta, 200);
    // }

    // public function FacturacionEntreFechas($request, $response, $args)
    // {
    //     $fecha_desde = $_GET['fecha_desde'];
    //     $fecha_hasta = $_GET['fecha_hasta'];
    //     $idMesa = $_GET['id_mesa'];
    //     $fecha_desde = strtotime($fecha_desde);
    //     $fecha_desde = date('Y-m-d H:i:s' , $fecha_desde);  
    //     $fecha_hasta = strtotime($fecha_hasta);
    //     $fecha_hasta = date('Y-m-d H:i:s' , $fecha_hasta);
    //     $respuesta;

    //     try
    //     {
    //         $factura = new App\Models\Factura;

    //         $facturacion = $factura->where('id_mesa', '=', $idMesa)
    //                             ->where('fecha', '>=', $fecha_desde)
    //                             ->where('fecha', '<=', $fecha_hasta)
    //                             ->selectRaw('id_mesa, sum(total) as "facturacion"')
    //                             ->get();                    

    //         if($facturacion[0]['id_mesa'] == NULL)
    //             $respuesta = array("Mesa" => "Sin informacion", "Facturacion" => "No hubo facturacion en el período");                      
    //         else
    //             $respuesta = array("Mesa" => $facturacion[0]->id_mesa, "Facturacion" => $facturacion[0]->facturacion); 
                
    //     }
    //     catch(Exception $e)
    //     {
    //         $mensaje = $e->getMessage();
    //         $respuesta = array("Estado" => "ERROR", "Mensaje" => $mensaje);
    //     }
    //     return $response->withJson($respuesta, 200);
    // }

    // public function MejoresComentarios($request, $response, $args)
    // {
    //     $fecha = $_GET['fecha'];
    //     $fecha_desde = $_GET['fecha_desde'];
    //     $fecha_hasta = $_GET['fecha_hasta'];
    //     $codigo = $_GET['codigo'];
    //     $encuesta = new App\Models\Encuesta;
    //     $mesa = new App\Models\Mesa;       
        
    //     try
    //     {
    //         $codigoMesa = $mesa->where('codigo', '=', $codigo)->first();

    //         if($codigoMesa)
    //         {
    //             if($fecha != 0)
    //             {         
    //                 $fecha = strtotime($fecha);
    //                 $fecha = date('Y-m-d H:i:s' , $fecha); 
        
    //                 $mejoresComentarios =  $encuesta->where('codigoMesa', '=', $codigo)
    //                                                 ->where('fecha', '=', $fecha)
    //                                                 ->where('puntuacionRestaurante', '>=', 6)
    //                                                 ->where('puntuacionMozo', '>=', 6)
    //                                                 ->where('puntuacionCocinero', '>=', 6)
    //                                                 ->get();                                
        
    //                 if($mejoresComentarios->isEmpty())
    //                 {
    //                     echo 'No se registran comentarios para esta mesa en esta fecha';
    //                 }
    //                 else 
    //                 {
    //                     for($i = 0; $i < count($mejoresComentarios); $i++)
    //                     {
    //                         echo 'Puntuacion Restaurante: ' . $mejoresComentarios[$i]->puntuacionRestaurante . ". Comentario: " . $mejoresComentarios[$i]->comentario . "\n";
    //                     }                
    //                 }                   
    //             }
    //             else
    //             {
    //                 $fecha_desde = strtotime($fecha_desde);
    //                 $fecha_desde = date('Y-m-d H:i:s' , $fecha_desde);  
    //                 $fecha_hasta = strtotime($fecha_hasta);
    //                 $fecha_hasta = date('Y-m-d H:i:s' , $fecha_hasta);
        
    //                 $mejoresComentarios =  $encuesta->where('codigoMesa', '=', $codigo)
    //                                                 ->where('fecha', '>=', $fecha_desde)
    //                                                 ->where('fecha', '<=', $fecha_hasta)
    //                                                 ->where('puntuacionRestaurante', '>=', 6)
    //                                                 ->where('puntuacionMozo', '>=', 6)
    //                                                 ->where('puntuacionCocinero', '>=', 6)
    //                                                 ->get();
        
    //                 for($i = 0; $i < count($mejoresComentarios); $i++)
    //                 {
    //                     echo 'Puntuacion Restaurante: ' . $mejoresComentarios[$i]->puntuacionRestaurante . ". Comentario: " . $mejoresComentarios[$i]->comentario . "\n";
    //                 }
    //             }

    //         }
    //         else
    //         {
    //             echo 'El codigo de mesa es incorrecto';
    //         }
    //     }
    //     catch(Exception $e)
    //     {
    //         $mensaje = $e->getMessage();
    //         $respuesta = array("Estado" => "Error", "Mensaje" => $mensaje);
    //         return $request->withJson($respuesta, 200);
    //     } 
    // }

    // public function PeoresComentarios($request, $response, $args)
    // {    
    //     $fecha = $_GET['fecha'];
    //     $fecha_desde = $_GET['fecha_desde'];
    //     $fecha_hasta = $_GET['fecha_hasta'];
    //     $codigo = $_GET['codigo'];
    //     $encuesta = new App\Models\Encuesta;
    //     $mesa = new App\Models\Mesa;        
        
    //     try
    //     {
    //         $codigoMesa = $mesa->where('codigo', '=', $codigo)->first();

    //         if($codigoMesa)
    //         {
    //             if($fecha != 0)
    //             {         
    //                 $fecha = strtotime($fecha);
    //                 $fecha = date('Y-m-d H:i:s' , $fecha); 
        
    //                 $peoresComentarios =  $encuesta->where('codigoMesa', '=', $codigo)
    //                                                 ->where('fecha', '=', $fecha)
    //                                                 ->where('puntuacionRestaurante', '<=', 5)
    //                                                 ->where('puntuacionMozo', '<=', 5)
    //                                                 ->where('puntuacionCocinero', '<=', 5)
    //                                                 ->get();                                
        
    //                 if($peoresComentarios->isEmpty())
    //                 {
    //                     echo 'No se registran comentarios para esta mesa en esta fecha';
    //                 }
    //                 else 
    //                 {
    //                     for($i = 0; $i < count($peoresComentarios); $i++)
    //                     {
    //                         echo 'Puntuacion Restaurante: ' . $peoresComentarios[$i]->puntuacionRestaurante . ". Comentario: " . $peoresComentarios[$i]->comentario . "\n";
    //                     }                
    //                 }                   
    //             }
    //             else
    //             {
    //                 $fecha_desde = strtotime($fecha_desde);
    //                 $fecha_desde = date('Y-m-d H:i:s' , $fecha_desde);  
    //                 $fecha_hasta = strtotime($fecha_hasta);
    //                 $fecha_hasta = date('Y-m-d H:i:s' , $fecha_hasta);
        
    //                 $peoresComentarios =  $encuesta->where('codigoMesa', '=', $codigo)
    //                                                 ->where('fecha', '>=', $fecha_desde)
    //                                                 ->where('fecha', '<=', $fecha_hasta)
    //                                                 ->where('puntuacionRestaurante', '<=', 5)
    //                                                 ->where('puntuacionMozo', '<=', 5)
    //                                                 ->where('puntuacionCocinero', '<=', 5)
    //                                                 ->get();
        
    //                 for($i = 0; $i < count($peoresComentarios); $i++)
    //                 {
    //                     echo 'Puntuacion Restaurante: ' . $peoresComentarios[$i]->puntuacionRestaurante . ". Comentario: " . $peoresComentarios[$i]->comentario . "\n";
    //                 }
    //             }
    //         }
    //         else
    //         {
    //             echo 'El codigo de mesa es incorrecto';
    //         }
    //     }
    //     catch(Exception $e)
    //     {
    //         $mensaje = $e->getMessage();
    //         $respuesta = array("Estado" => "Error", "Mensaje" => $mensaje);
    //         return $request->withJson($respuesta, 200);
    //     } 
    // }

    // static function BuscarMesaMasUsada($mesasUsadasDao)
    // {
    //     $mesasUsadas = [];
        
    //     for($i = 0; $i < count($mesasUsadasDao); $i++)
    //     {
    //         $mesasUsadas[] = $mesasUsadasDao[$i]->id_mesa;
    //     }
        
    //     $mesasUsadas[] = -1;
    //     $mesaMasUsada;
    //     $cantidad = 0;

    //     if(count($mesasUsadas) > 1)
    //     {
    //         $contador = 1;            
    
    //         for($i = 0; $i <= count($mesasUsadas); $i++)
    //         {
    //             if($mesasUsadas[$i+1] == -1)
    //             {
    //                 if($contador > $cantidad)
    //                 {
    //                     $cantidad = $contador;
    //                     $mesaMasUsada = $mesasUsadas[$i];     
    //                 } 
    //                 break;            
    //             }

    //             if($mesasUsadas[$i+1] == $mesasUsadas[$i])
    //             {
    //                 $contador++;
    //             }

    //             else
    //             {
    //                 if($contador > $cantidad)
    //                 {
    //                     $cantidad = $contador;
    //                     $mesaMasUsada = $mesasUsadas[$i];       
    //                 }   
    //                 $contador = 1;                 
    //             }  
    //         }
    //         echo 'Mesa mas usada: ' . $mesaMasUsada . "\n" . "Cantidad de veces: " . $cantidad . "\n";
    //     }
    //     else
    //     {
    //         echo 'Sin operaciones' . "\n";
    //     }
    // }

    // static function BuscarMesaMenosUsada($mesasUsadasDao, $mesasUsadas)
    // {       
    //     $mesasUsadas[] = -1;
    //     $mesaMenosUsada;
    //     $cantidad = 999999999;

    //     if(count($mesasUsadas) > 1)
    //     {
    //         $contador = 1;            
    
    //         for($i = 0; $i <= count($mesasUsadas); $i++)
    //         {
    //             if($mesasUsadas[$i+1] == -1)
    //             {
    //                 if($contador < $cantidad)
    //                 {
    //                     $cantidad = $contador;
    //                     $mesaMenosUsada = array("id" => $mesasUsadas[$i], "cantidad" => $cantidad);     
    //                 } 
    //                 break;            
    //             }

    //             if($mesasUsadas[$i+1] == $mesasUsadas[$i])
    //             {
    //                 $contador++;
    //             }

    //             else
    //             {
    //                 if($contador < $cantidad)
    //                 {
    //                     $cantidad = $contador;
    //                     $mesaMenosUsada = array("id" => $mesasUsadas[$i], "cantidad" => $cantidad);       
    //                 }   
    //                 $contador = 1;                 
    //             }  
    //         }
    //     }
    //     else
    //     {
    //         $mesaMenosUsada = -1;
    //     }
    //     return $mesaMenosUsada;
    // }
}

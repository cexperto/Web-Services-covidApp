<?php
header("Content-Type: application/json");

$mysqli = new mysqli("remotemysql.com","95w8aOMoTo","hsrKz2niTA","95w8aOMoTo");

if($mysqli->connect_errno){
    echo "No es posible hacer conexion";
    exit;
}


$sql = "SELECT * FROM encuesta";

mysqli_set_charset($mysqli, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($mysqli, $sql)) die();

$encuesta = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
    $id=$row['id'];
    $nombres=$row['nombres'];
    $correo=$row['correo'];
    $pregunta1=$row['pregunta1'];
    $pregunta2=$row['pregunta2'];
    $pregunta3=$row['pregunta3'];
    $pregunta4=$row['pregunta4'];
    $pregunta5=$row['pregunta5'];
    $pregunta6=$row['pregunta6'];
    $pregunta7=$row['pregunta7'];
    $pregunta8=$row['pregunta8'];
      

    $encuesta[] = array('id'=> $id, 
                        'nombres'=> $nombres,
                        'correo'=> $correo,
                        'pregunta1'=> $pregunta1,
                        'pregunta2'=> $pregunta2,
                        'pregunta3'=> $pregunta3,
                        'pregunta4'=> $pregunta4,
                        'pregunta5'=> $pregunta5,
                        'pregunta6'=> $pregunta6,
                        'pregunta7'=> $pregunta7,
                        'pregunta8'=> $pregunta8);

}
    
$json_string = json_encode($encuesta);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'encuesta.json';
file_put_contents($file, $json_string);
*/
    




// El script automáticamente liberará el resultado y cerrará la conexión
// a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
$result->free();
//$mysqli->close();


//webClient.UploadValues("https://xamaringrupo8.000webhostapp.com/Registro.php", "POST", parametro);
//const string URL = "https://xamaringrupo8.000webhostapp.com/Listar.php";

/* 
<StackLayout>
                    <!-- Aqui Creamos dos controles uno de Tipo Label y otro de Tipo picker el cual usaremos para seleccionar una opción -->
                    <Label Text="3. ¿Qué probabilidad existe de que recomiende el hotel?" HorizontalOptions="Start" FontAttributes="Bold" Font="15" TextColor="Black"/>
                    <StackLayout  VerticalOptions="Center">
                        <Picker x:Name="pickerPregunta1"
                            Title="Seleccione Una Opción"
                            FontSize="15"
                            SelectedIndexChanged="picker_SelectedIndexChanged">
                            <Picker.ItemsSource>
                                <x:Array Type="{x:Type x:String}">
                                    <x:String>Muy Probable</x:String>
                                    <x:String>Poco Probable</x:String>
                                    <x:String>No Lo Recomendaria</x:String>
                                </x:Array>
                            </Picker.ItemsSource>
                        </Picker>
                        <Label x:Name="lblPregunta1" IsVisible="false"/>
                    </StackLayout>
                </StackLayout>
                <StackLayout>
                    <!-- Aqui Creamos dos controles uno de Tipo Label para la pregunta 4 y otro de Tipo Switch para seleccionar un dato de tipo boleano falso o verdadero-->
                    <Label Text="4.	¿Le gustaría que incluyéramos en los servicios del hotel la organización de actividades de rutas turísticas?" 
                           HorizontalOptions="Start" FontAttributes="Bold" Font="15" TextColor="Black"/>
                    <StackLayout Orientation="Horizontal" HorizontalOptions="Center">
                        <Switch x:Name="switch1"
                                HorizontalOptions="Start"
                                VerticalOptions="CenterAndExpand" />
                         <Label x:Name="lblPregunta2" Text="No"
                                HorizontalOptions="Start"
                                VerticalOptions="CenterAndExpand"
                                TextColor="Black">
                            <Label.Triggers>
                                <DataTrigger TargetType="Label"
                                                Binding="{Binding Source={x:Reference switch1},
                                                Path=IsToggled}"
                                                Value="True">
                                    <Setter Property="Text" Value="Si" />
                                </DataTrigger>
                            </Label.Triggers>
                        </Label>
                    </StackLayout>
                </StackLayout>
                <StackLayout>
                    <!-- Aqui Creamos dos controles uno de Tipo Label para la pregunta 4 y otro de Tipo Switch para seleccionar un dato de tipo boleano falso o verdadero-->
                    <Label Text="5.	¿Estaría dispuesto a pagar una tarifa adicional para incluir con su hospedaje el servicio de transporte de ida y vuelta?"
                           HorizontalOptions="Start" FontAttributes="Bold" Font="15" TextColor="Black"/>
                    <StackLayout Orientation="Horizontal" HorizontalOptions="Center">
                        <Switch x:Name="switch2"
                                HorizontalOptions="Start"
                                VerticalOptions="CenterAndExpand" />
                         <Label x:Name="lblPregunta3" Text="No"
                                HorizontalOptions="Start"
                                VerticalOptions="CenterAndExpand"
                                TextColor="Black">
                            <Label.Triggers>
                                <DataTrigger TargetType="Label"
                             Binding="{Binding Source={x:Reference switch2},
                                               Path=IsToggled}"
                             Value="True">
                                    <Setter Property="Text" Value="Si" />
                                </DataTrigger>
                            </Label.Triggers>
                        </Label>
                    </StackLayout>
                </StackLayout>
                <StackLayout>
                    <!-- Aqui Creamos dos controles uno de Tipo Label y otro de Tipo picker el cual usaremos para seleccionar una opción -->
                    <Label Text="6.	¿Cómo califica la atención por parte del personal que lo atendió?" 
                           HorizontalOptions="Start" FontAttributes="Bold" Font="15" TextColor="Black"/>
                    <StackLayout  VerticalOptions="Center">
                        <Picker x:Name="pickerPregunta4"
                            Title="Seleccione Una Opción"
                            FontSize="15"
                            SelectedIndexChanged="pickerPregunta4_SelectedIndexChanged">
                            <Picker.ItemsSource>
                                <x:Array Type="{x:Type x:String}">
                                    <x:String>Muy Buena</x:String>
                                    <x:String>Buena</x:String>
                                    <x:String>Regular</x:String>
                                    <x:String>Mala</x:String>
                                    <x:String>Muy Mala</x:String>
                                </x:Array>
                            </Picker.ItemsSource>
                        </Picker>
                        <Label x:Name="lblPregunta4" IsVisible="false"/>
                    </StackLayout>
                </StackLayout>
                <StackLayout>
                    <!-- Aqui Creamos dos controles uno de Tipo Label y otro de Tipo entry para ingresar texto-->
                    <Label Text="7.	¿Qué servicios adicionales le gustaría que incluyéramos?" 
                           HorizontalOptions="Start" FontAttributes="Bold" Font="15" TextColor="Black"/>
                    <Entry x:Name="entryPregunta5" Placeholder="Ingrese su respuesta" FontSize="15"/>
                </StackLayout>
                <StackLayout>
                    <!-- Aqui Creamos dos controles uno de Tipo Label y otro de Tipo entry para ingresar texto-->
                    <Label Text="8.	¿Qué servicios eliminaria?" 
                           HorizontalOptions="Start" FontAttributes="Bold" Font="15" TextColor="Black"/>
                    <Entry x:Name="entryPregunta6" Placeholder="Ingrese su respuesta" FontSize="15"/>
                </StackLayout>
                
                
                <StackLayout>
                    <!-- Aqui Creamos dos controles uno de Tipo Label y otro de Tipo editor para ingresar texto largo-->
                    <Label Text="09.	Si tiene algún comentario adicional que no le hayamos preguntado, por favor, escríbalo aquí" 
                           HorizontalOptions="Start" FontAttributes="Bold" Font="15" TextColor="Black"/>
                    <Editor x:Name="editorPregunta7"
                            FontSize="Small"
                            HeightRequest="150"
                            Placeholder="Escriba Aqui"
                            FontAttributes="Italic"
                            TextColor="Black"/>
                </StackLayout>
 */

?>
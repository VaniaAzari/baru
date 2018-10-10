<html>
<head>
   <style>
   table {border-collapse:collapse;}
   table th {background-color: #ddd}
   </style>
</head>
<body>  
  <img src="img/pcr.jpg" width="100%"> 
  <hr><width="100"></hr> <br>
 <b> Daftar Tugas Mahasiswa </b> <br>
  Berikut ini terlampir nama-nama mahasiswa yang mengumpulkan tugas, sebagai berikut:  <br> <br>
          <table border="1" width="100%">
                    <thead>
                        <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Nama Mahasiswa</th>
                        <th style="text-align: center;">File</th>                     
                        <th style="text-align: center;">Nilai</th>                       
                      </tr>
                    </thead>
                    <tbody>
                       @if (!$tugasmahasiswa->isEmpty()) 
                         @foreach($tugasmahasiswa as $key => $value)
                                <tr>
                                  <td style="text-align: center;">{{ $key+1 }}</td>
                                  <td>{{ $value->mahasiswa->nama }}</td>
                                  <td>{{ $value['file_name'] }}</td>                                
                                  <td style="text-align: center;">{{ $value['nilai'] }}</td>                                  
                                </tr>
                          @endforeach   
                           @else
                              <tr>
                                <td colspan="8"><center>No data available in table</center></td>
                              </tr>
                            @endif                          
                    </tbody>
                </table>
              </div>  
            </body>      
            </html>
      

    
  
            


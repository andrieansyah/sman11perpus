<?php
/**
 * Template for visitor counter
 * name of memberID text field must be: memberID
 * name of institution text field must be: institution
 *
 * Copyright (C) 2015 Arie Nugraha (dicarve@gmail.com)
 * Create by Eddy Subratha (eddy.subratha@slims.web.id)
 * 
 * Slims 8 (Akasia)
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 */

$main_template_path = $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/login_template.inc.php';

?>
        <div class="col-md-4">
                <div class="news">
                    <h2>Polling</h2>
                    <?php
                    

                    //memilih database yang akan digunakan
                    //mysql_select_db($db_name, $con);

                    //mengambil data
                    $poll_q = "SELECT * FROM poll"; 
                    $poll_d = $dbs->query($poll_q);

                    // check if query is success or failed
                    if ($data = $poll_d->fetch_assoc()) {
                      $opsi1 = $data['sangatBaik'];
                      $opsi2 = $data['baik'];
                      $opsi3 = $data['kurangBaik'];
                      $opsi4 = $data['tidakBaik'];
                    }
                    ?>
              <!-- This Fuction add by Drajat Hasan (drajathasan20@gmail.com)-->
              <script src="<?php echo JWB;?>chartjs/Chart.bundle.js"></script>
              <script type="text/javascript">
              $(document).ready(function() {
                $('#polling').submit(function() {
                    // Check
                    $.ajax({
                      type: 'POST',
                      url: $(this).attr('action'),
                      data: $(this).serialize(),
                      cache: false,
                      async: false,
                      success: function(data) {
                       alert('Terimakasih telah mengisi polling :)');
                      },
                      error: function(){
                        alert('Error inserting counter data to database!');
                      }
                });
                return false;
                });
              });
              </script>
              <style type="text/css">
                .conta {
                  width: 50%;
                }
              </style>
               
                <p>Bagaimana pendapat anda tentang Aplikasi Perpustakaan kami ini?</p> 
                <form id="polling" method="post" action="index.php?p=poll">
                    <table style="text-align: left;">
                        <tr><td><input type="radio" name="tanya" value="sangatBaik" checked/></td>
                            <td>Sangat Baik</td>
                        </tr>
                        <tr><td><input type="radio" name="tanya" value="baik" /></td>
                            <td>Baik</td>
                        </tr>
                        <tr><td><input type="radio" name="tanya" value="kurangBaik" /></td>
                            <td>Kurang Baik</td>
                        </tr>
                        <tr><td><input type="radio" name="tanya" value="tidakBaik" /></td>
                            <td>Tidak Baik</td>
                       </tr>
                    </table>
                <tr><td><input type="submit" class="submit_button" style="color: #000;" name="Submit" value="<?php echo __('Save'); ?>"></td></tr> 
                </table> 
                </form>
                
                <div class="row">
                    <canvas id="myChart" width="40" height="40"></canvas>
                </div>

                <h3>Statistik Polling</h3>
                <div class="conta">
                    <canvas id="myChart" width="80" height="80"></canvas>
                </div>
                <script>
                  var ctx = document.getElementById("myChart");
                  var myChart = new Chart(ctx, {
                      type: 'doughnut',
                      data: {
                          labels: ["Sangat Baik", "Baik", "Kurang Baik", "Tidak Baik"],
                          datasets: [{
                                  label: '# of Votes',
                                  data: [<?php echo $opsi1.', '.$opsi2.', '.$opsi3.', '.$opsi4;?>],
                                  backgroundColor: [
                                      'rgba(255, 99, 132, 1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)'
                                  ],
                                  borderColor: [
                                      'rgba(255,99,132,1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)'
                                  ],
                                  borderWidth: 1
                              }]
                      },
                      options: {
                          animation : false,
                          scales: {
                              yAxes: [{
                                      ticks: {
                                          display: false,
                                          beginAtZero: true
                                      }
                                  }]
                          }
                      }
                  });
              </script>

           
                </div><!-- /.news-small -->
            </div>
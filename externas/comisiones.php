        <?php 
            $comisiones = json_decode(file_get_contents('http://transparencia.guadalajara.gob.mx/transparencia/comisiones-edilicias-json'), TRUE);

            foreach ($comisiones['nodes'] as $value) {

                foreach ($value as $key => $val) {
                    $comision = $val['Comision'];
                    $arrTodos[$comision][] = array('Cargo' => $val['Cargo'], 'Integrante' => $val['Integrante']);
                }
            }



            foreach($arrTodos as $titulo => $value) { ?>
                    <table class="views-table cols-2 comisiones">
                            <caption><?php echo $titulo; ?></caption>
                            <thead>
                                <tr>
                                    <th class="views-field views-field-field-cargo-value">Cargo</th>
                                    <th class="views-field views-field-title">Integrantes</th>
                                </tr>
                            </thead>
                         <tbody>

                            <?php foreach($value as $val) { ?>
                               <tr class="odd views-row-first">
                                         <td class="views-field views-field-field-cargo-value">
                                   <div class="left"><?php echo $val['Cargo']; ?></div>          </td>
                                         <td class="views-field views-field-title">
                                   <div class="left"><?php echo $val['Integrante'] ?></div>          </td>
                               </tr>

                             <?php   } ?>
                          </tbody>
                    </table>
        <?php } ?>



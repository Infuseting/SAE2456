<?php
$id = $_GET['id'];
$conn = getConn();
$QUERY = "SELECT * FROM rap_commande WHERE COM_NUM = ?";
$stmt = $conn->prepare($QUERY);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    header('Location: /error/404');
    exit();
}

$QUERY = "SELECT * FROM RAP_COMMANDE WHERE COM_NUM = ? AND CLI_NUM = ?";
$stmt = $conn->prepare($QUERY);
$stmt->bind_param('ii', $id, $_SESSION['client_num']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    header('Location: /error/403');
    exit();
}
$QUERY = "SELECT 
  PLA_NUM, 
  APP_QUANTITE, 
  PLA_NOM, 
  CASE 
    WHEN PLA_MENU = 0 THEN 
      CASE 
        WHEN LENGTH(PLA_NUM) = 4 THEN 'KEBAB / PIZZA'
        WHEN LENGTH(PLA_NUM) = 3 THEN 'ACCOMPAGNEMENTS'
        WHEN LENGTH(PLA_NUM) = 2 THEN 'BOISSON'
        WHEN LENGTH(PLA_NUM) = 1 THEN 'DESSERT'
        ELSE 'UNKNOWN'
      END
    ELSE 'MENU'
  END AS CATEGORIE,

  CASE
    WHEN PLA_MENU = 1 THEN (
      SELECT CONCAT(
        p.PLA_NOM, ';', a.PLA_NOM, ';', b.PLA_NOM, ';', d.PLA_NOM
      )
      FROM RAP_PLAT t
      JOIN RAP_PLAT p ON p.PLA_NUM = CONCAT(SUBSTRING(t.PLA_NUM, 1, 1), '000')
      JOIN RAP_PLAT a ON a.PLA_NUM = CONCAT(SUBSTRING(t.PLA_NUM, 2, 1), '00')
      JOIN RAP_PLAT b ON b.PLA_NUM = CONCAT(SUBSTRING(t.PLA_NUM, 3, 1), '0')
      JOIN RAP_PLAT d ON d.PLA_NUM = SUBSTRING(t.PLA_NUM, 4, 1)
      WHERE t.PLA_NUM = RAP_PLAT.PLA_NUM
    )
  END AS ALIMENTS,

  PLA_PRIX_VENTE_UNIT_HT 

FROM 
  RAP_APPARTENIR 
JOIN 
  RAP_PLAT USING (PLA_NUM)
WHERE COM_NUM = ?
ORDER BY
  CASE 
    WHEN PLA_MENU = 1 THEN 0
    WHEN LENGTH(PLA_NUM) = 4 THEN 1
    WHEN LENGTH(PLA_NUM) = 3 THEN 2
    WHEN LENGTH(PLA_NUM) = 2 THEN 3
    WHEN LENGTH(PLA_NUM) = 1 THEN 4
    ELSE 5
  END;
";
$stmt = $conn->prepare($QUERY);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    header('Location: /error/404');
    exit();
}
?>
<div class="mx-20 my-20">
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
            <tr>
                <th>Quantité</th>
                <th>Plat</th>
                <th>Type</th>
                <th>Prix/u</th>
            </tr>
            </thead>
            <tbody>
            <!-- row 1 -->
            <?php
                while ($row = $result->fetch_assoc()) {
                    $PLA_NUM = $row['PLA_NUM'];
                    $APP_QUANTITE = $row['APP_QUANTITE'];
                    $PLA_NOM = $row['PLA_NOM'];
                    $CATEGORIE = $row['CATEGORIE'];
                    $ALIMENTS = isset($row['ALIMENTS']) ? explode(';', $row['ALIMENTS']) : [];
                    $PLA_PRIX_VENTE_UNIT_HT = number_format($row['PLA_PRIX_VENTE_UNIT_HT'], 2, ',', ' ');
                    echo '<tr>
                        <td>' . $APP_QUANTITE . '</td>
                        <td>' . $PLA_NOM . '</td>
                        <td>' . $CATEGORIE . '</td>
                        <td>€' . $PLA_PRIX_VENTE_UNIT_HT . '</td>
                    </tr>';
                    if ($CATEGORIE === 'MENU') {
                        $ALIMENT = explode(';', $ALIMENTS[0]);
                        foreach ($ALIMENTS as $ALIMENT) {
                            $ALIMENT_NOM = $ALIMENT;
                            echo '<tr>
                                <td></td>
                                <td>' . $ALIMENT_NOM . '</td>
                                <td></td>
                                <td></td>
                            </tr>';
                        }
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

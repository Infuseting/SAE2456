<?php
    $conn = getConn();
    if (!isset($_SESSION['client_num']) && isValidToken($_SESSION['access_token'])) {
        header('Location: /login');
        exit();
    }
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $file = $_FILES['avatar'];
    $uploadDir = __DIR__ . '/../assets/img/user/';
    $uploadFile = $uploadDir . $_SESSION['client_num'] . '.png';
    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        echo json_encode(['success' => true, 'message' => 'Avatar updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to upload avatar.']);
    }
    exit();
}
?>
<div class="mx-20 my-20">
    <div class="py-3 flex items-center text-sm text-primary before:flex-1 before:border-t before:border-base-200 before:me-6 after:flex-1 after:border-t after:border-base-200 after:ms-6">Avatar</div>
    <div class="flex flex-column mt-4 mb-4">
        <div id="avatar-container" class="avatar-container rounded-full border border-black">
            <img id="player-avatar" class="player-avatar w-64 h-64 rounded-full"
                 src="<?php echo file_exists(__DIR__ ."/../assets/img/user/" . $_SESSION['client_num'] . ".png") ? "/assets/img/user/" . $_SESSION['client_num'] . ".png" : "/assets/img/user/default_black.png"; ?>"
                 alt="Player Avatar"
            />
        </div>
    </div>
    <div class="py-3 flex items-center text-sm text-primary before:flex-1 before:border-t before:border-base-200 before:me-6 after:flex-1 after:border-t after:border-base-200 after:ms-6">Mes commandes</div>
    <div class="flex flex-row mt-4 mb-4 flex-wrap">
        <?php
            $query = "SELECT 
  CLI_NUM, 
  COM_NUM, 
  CONCAT(RES_Adresse, ' ', RES_Ville) AS ADRESSE, 
  COM_PRIX_TOTAL, 
  SUM(APP_QUANTITE) AS PRODUIT, 
  CONCAT(COM_DATE, ' ', TIME(COM_HEURE_RECUP)) AS DATE
FROM 
  RAP_COMMANDE 
  JOIN RAP_RESTAURANT USING (RES_NUM) 
  JOIN RAP_APPARTENIR USING (RES_NUM, COM_NUM)
WHERE CLI_NUM = ?
GROUP BY 
  CLI_NUM, COM_NUM, ADRESSE, COM_PRIX_TOTAL, DATE
ORDER BY DATE DESC
LIMIT 0,100;";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $_SESSION['client_num']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows !== 0) {
                while ($row = $result->fetch_assoc()) {
                    $COM_NUM = $row['COM_NUM'];
                    $ADRESSE = $row['ADRESSE'];
                    $COM_PRIX_TOTAL = $row['COM_PRIX_TOTAL'];
                    $PRODUIT = $row['PRODUIT'];
                    $COM_DATE = $row['DATE'];
                    if (new DateTime($COM_DATE) < new DateTime()) {
                        echo '<div class="alert alert-outline max-sm:alert-vertical alert-primary text-xs font-bold p-4 w-full flex flex-column items-center justify-between mb-8">

            <div class="text-xl text-primary">
                ✅
            </div>
            <div>
                <p class="text-xl text-primary">N°' . $COM_NUM . '</p>
            </div>
            <div>
                <p class="text-xl text-primary">' . $ADRESSE . '</p>
            </div>
            <div>
                <p class="text-xl text-primary">' . $PRODUIT . ' produits</p>
            </div>
            <div>
                <p class="text-xl text-primary">€' . $COM_PRIX_TOTAL . '</p>
            </div>

            <div>

                <p class="text-xl text-primary">' . $COM_DATE . '</p>
            </div>
            <div>
                <a href="/commande/view?id='.$COM_NUM.'" class="btn btn-primary">Plus d\'informations</a>
            </div>
        </div>';
                    } else {
                        $interval = (new DateTime())->diff(new DateTime($COM_DATE));
                        $minute = $interval->i + $interval->h * 60 + $interval->d * 24 * 60;
                        $seconds = $interval->s;
                        echo '
                <div class="alert alert-outline max-sm:alert-vertical alert-primary text-xs font-bold p-4 w-full flex flex-column items-center justify-between mb-8">
                    <div>
                        <span class="loading loading-ring loading-xl"></span>
                    </div>
                    <div>
                        <p class="text-xl text-primary">N°' . $COM_NUM . '</p>
                    </div>
                    <div>
                        <p class="text-xl text-primary">' . $ADRESSE . '</p>
                    </div>
                    <div>
                        <p class="text-xl text-primary">' . $PRODUIT . ' produits</p>
                    </div>
                    <div>
                        <p class="text-xl text-primary">€' . $COM_PRIX_TOTAL . '</p>
                    </div>

                    <div>
                        <span class="countdown font-mono text-primary text-2xl">
                            <span style="--value:'.$minute.';" aria-live="polite" aria-label="'.$minute.'">'.$minute.'</span>
                            m
                            <span style="--value:'.$seconds.';" aria-live="polite" aria-label="'.$seconds.'">'.$seconds.'</span>
                            s
                        </span>
                        <script>
                            const countdown = document.querySelector(\'.countdown\');
                            const minute = countdown.querySelector(\'span:nth-child(1)\');
                            const second = countdown.querySelector(\'span:nth-child(2)\');
                            setInterval(() => {
                                let minutes = parseInt(minute.style.getPropertyValue(\'--value\'));
                                let seconds = parseInt(second.style.getPropertyValue(\'--value\'));

                                if (seconds === 0) {
                                    if (minutes === 0) {
                                        clearInterval(this);
                                    } else {
                                        minutes--;
                                        seconds = 59;
                                    }
                                } else {
                                    seconds--;
                                }

                                minute.style.setProperty(\'--value\', minutes);
                                second.style.setProperty(\'--value\', seconds);
                                minute.setAttribute(\'aria-label\', minutes);
                                second.setAttribute(\'aria-label\', seconds);
                                minute.textContent = minutes;
                                second.textContent = seconds;
                            }, 1000);

                        </script>
                    </div>
                    <div>
                <a href="/commande/view?id='.$COM_NUM.'" class="btn btn-primary">Plus d\'informations</a>
            </div>
                </div>';
                    }


                }
            }
            else {

                echo '<p class="text-primary text-center">No orders found.</p>';
            }
            



        ?>


    </div>

</div>

<script>
    const avatarContainer = document.getElementById('avatar-container');
    const playerAvatar = document.getElementById('player-avatar');

    // Handle left-click to change avatar
    avatarContainer.addEventListener('click', () => {
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = 'image/*';
        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            const formData = new FormData();
            formData.append('avatar', file);

            fetch('/profile', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        alert(data.message);
                        playerAvatar.src = URL.createObjectURL(file);
                    } else {
                        alert(data.message);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });

            window.location.reload();
        });
        fileInput.click();
    });

    // Handle drag-and-drop to change avatar
    avatarContainer.addEventListener('dragover', (event) => {
        event.preventDefault();
    });

    avatarContainer.addEventListener('drop', (event) => {
        event.preventDefault();
        const file = event.dataTransfer.files[0];
        const formData = new FormData();
        formData.append('avatar', file);

        fetch('/profile', {
            method: 'POST',
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    alert(data.message);
                    playerAvatar.src = URL.createObjectURL(file);
                } else {
                    alert(data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });

        window.location.reload();
    });
</script>
<?php

echo "
    <script>
        alert(\"Saiu com sucesso\");
        localStorage.removeItem('id_user');
        localStorage.removeItem('name_user');
        javascript:history.go(-1);
    </script>";

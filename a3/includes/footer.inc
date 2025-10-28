<footer class="container-fluid d-flex justify-content-between flex-wrap gap-1">
    <div class="gap-1 ps-5">
        <?php
        $sqluser = "SELECT user_id, username FROM users ORDER BY user_id";
        $stmt = $conn->prepare($sqluser);
        $stmt->execute();
        $recordsUser = $stmt->get_result();
        foreach ($recordsUser as $row) {
            echo '<a href="instructor.php?user_id=' . $row['user_id'] . '" class="mb-0 me-3 text-decoration-none text-light">' . $row['username'] . '</a>';
        }

        ?>
    </div>
        <p class="text-end mb-0">&copy;2025, SkillSwap, All Rights Reserved.</p>
    
</footer>

</body>

</html>
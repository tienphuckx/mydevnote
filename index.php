<?php
require "blog/post_ctl.php";
session_start();
if (isset($_SESSION['user'])) {
    $user_email = $_SESSION['user']['email'];
    $user_fname = $_SESSION['user']['fname'];
    $user_lname = $_SESSION['user']['lname'];
}

/**Default value for pagination */
$num_post = 5;
$index = 0;
$posts = get_newest_post($num_post, $index);
$right_side_tags = fetch_tags();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tienphuckx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="blog/root.css">
    <link rel="stylesheet" href="blog/css_index.css">

</head>

<body>
    <header class="bg-dark py-2">
        <div class="container">
            <div class="wel_come d-flex justify-content-end align-items-center">
                <p class="">
                    Welcome
                    <?php
                    if (isset($user_email) && !empty($user_email)) {
                        echo $user_fname . " " . $user_lname . " (" . htmlspecialchars($user_email) . ") ";
                    } else {
                        echo "anonymous";
                    }
                    ?>
                    to My Blog
                </p>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <nav>
                    <ul class="nav index-nav">
                        <li class="nav-item">
                            <a class="btn nav-link btn-secondary text-white" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn nav-link btn-secondary text-white" href="#posts">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn nav-link btn-secondary text-white" href="#series">C Series</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn nav-link btn-secondary text-white" href="#donate">C++ Series</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn nav-link btn-secondary text-white" href="#donate">About me</a>
                        </li>
                    </ul>
                </nav>

                <div class="action-btn">
                    <?php
                    if (!isset($_SESSION['user']['email']) || empty($_SESSION['user']['email'])) {
                        echo '<button id="loginBtn" class="btn btn-primary">Login</button>';
                        echo '<button id="registerBtn" class="btn btn-success ms-3">Register</button>';
                    } else {
                        echo '<button id="logoutBtn" class="btn btn-secondary">Logout</button>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>

    <main class="container my-2">
        <div class="row">
            <div class="col-md-9">
                <section id="home-content" class="content-section">
                    <?php
                    if (is_array($posts) && count($posts) > 0) {
                        foreach ($posts as $post) {
                            ?>
                            <a class="a-card" href="post.php?id=<?php echo $post['post_content_id']; ?>">
                                <div class="card mb-2 h-100">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h3>
                                        <p class="card-text"><?php echo htmlspecialchars($post['short_intro']); ?></p>
                                    </div>

                                    <div class="card-footer">
                                        <div class="tags">
                                            <?php if (!empty($post['tags'])) { ?>
                                                <?php foreach ($post['tags'] as $tag) { ?>
                                                    <span class="badge bg-primary"><?php echo htmlspecialchars($tag); ?></span>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>

                                        <div class="created-date">
                                            <span
                                                class="time"><?php echo htmlspecialchars($post['created_date']); ?></span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                            <?php
                        }
                    } else {
                        echo '<p>No posts available.</p>';
                    }
                    ?>






                </section>
            </div>

            <div class="col-md-3">
                <section id="right-area">
                    <?php if (!empty($right_side_tags)) { ?>
                        <?php foreach ($right_side_tags as $tag) { ?>
                            <span class="badge bg-primary"><?php echo htmlspecialchars($tag); ?></span>
                        <?php } ?>
                    <?php } else { ?>
                        <p>No tags available.</p>
                    <?php } ?>
                </section>

            </div>

        </div>

    </main>

    <footer class="bg-dark py-3">
        <div class="container text-center">
            <p class="cpy-right">&copy; 2024 tienphuckx. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="blog/js_index.js"></script>
    <script>
        document.getElementById("logoutBtn").addEventListener("click", function () {
            window.location.href = "logout.php";
        });

    </script>
    <script>
        document.getElementById("registerBtn").addEventListener("click", function () {
            console.log("Register btn");
            window.location.href = "register.php";
        });
    </script>
</body>

</html>
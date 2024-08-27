<?php
// 启动会话
session_start();

// 定义正确密码常量
define('CORRECT_PASSWORD', '123'); // 替换为实际密码

// 初始化错误消息为空
$error = '';

// 检查请求方法是否为 POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取用户输入的密码
    $password = $_POST['password'] ?? '';

    // 验证密码是否正确
    if ($password === CORRECT_PASSWORD) {
        // 设置会话变量，标记用户已登录
        $_SESSION['logged_in'] = true;
        // 重定向到受保护的页面
        header('Location: protected.php');
        exit; // 确保脚本停止执行
    } else {
        // 如果密码不正确，设置错误消息
        $error = 'Invalid password. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* 整个页面的样式设置 */
        body {
            font-family: Arial, sans-serif; /* 设置字体 */
            display: flex; /* 使用弹性盒布局 */
            justify-content: center; /* 水平居中对齐 */
            align-items: center; /* 垂直居中对齐 */
            min-height: 100vh; /* 最小高度为视口高度 */
            margin: 0; /* 去除默认的外边距 */
            background-color: #f0f0f0; /* 设置背景色 */
        }

        /* 登录容器的样式设置 */
        .container {
            background: #fff; /* 背景色为白色 */
            padding: 2.5rem; /* 内边距 */
            border-radius: 8px; /* 圆角 */
            box-shadow: 0 0 15px rgba(0,0,0,0.1); /* 阴影效果 */
            width: 100%; /* 宽度为100% */
            max-width: 750px; /* 最大宽度 */
            box-sizing: border-box; /* 包括内边距和边框在内宽度计算 */
            text-align: center; /* 文本居中对齐 */
        }

        /* 标题样式 */
        h2 {
            margin: 0 0 20px 0; /* 外边距 */
            color: #333; /* 字体颜色 */
            font-size: 2.5rem; /* 字体大小 */
        }

        /* 标签样式 */
        label {
            display: block; /* 块级显示 */
            margin: 0 0 10px 0; /* 外边距 */
            text-align: left; /* 左对齐文本 */
            font-size: 2rem; /* 字体大小 */
        }

        /* 密码输入框样式 */
        input[type="password"] {
            width: calc(100% - 24px); /* 计算宽度以适应内边距 */
            padding: 18px; /* 内边距 */
            margin: 0 0 20px 0; /* 外边距 */
            border: 1px solid #ddd; /* 边框样式 */
            border-radius: 4px; /* 圆角 */
            box-sizing: border-box; /* 包括内边距和边框在内宽度计算 */
            font-size: 2rem; /* 字体大小 */
        }

        /* 提交按钮样式 */
        input[type="submit"] {
            width: 50%; /* 宽度为父容器的50% */
            padding: 18px; /* 内边距 */
            border: none; /* 无边框 */
            border-radius: 4px; /* 圆角 */
            background-color: #007bff; /* 背景色 */
            color: #fff; /* 字体颜色 */
            font-size: 2rem; /* 字体大小 */
            cursor: pointer; /* 鼠标悬停时显示为手型 */
        }

        /* 提交按钮的悬停效果 */
        input[type="submit"]:hover {
            background-color: #0056b3; /* 悬停时背景色变暗 */
        }

        /* 错误消息样式 */
        .error {
            color: #ff0000; /* 错误消息字体颜色 */
            margin: 10px 0 0 0; /* 外边距 */
            font-size: 2rem; /* 字体大小 */
        }

        /* 针对较小屏幕的媒体查询 */
        @media (max-width: 1441px) {
            .container {
                padding: 2.5rem; /* 调整内边距 */
                max-width: 90%; /* 适应较小屏幕 */
            }
            input[type="password"], input[type="submit"] {
                font-size: 3rem; /* 增加字体大小 */
                padding: 18px; /* 内边距 */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <!-- 登录表单 -->
        <form method="post" action="">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Login">
        </form>
        <!-- 显示错误消息 -->
        <?php if ($error) echo '<p class="error">' . htmlspecialchars($error) . '</p>'; ?>
    </div>
</body>
</html>

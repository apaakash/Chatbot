<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart Chatbot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .chat-container {
            width: 90%;
            max-width: 700px;
            height: 400px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        h3 {
            background: #2874f0;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin: 0;
        }

        .chat-box {
            flex: 1;
            height: 300px;
            overflow-y: auto;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            display: flex;
            flex-direction: column;
        }

        .bot-message,
        .user-message {
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            max-width: 75%;
            word-wrap: break-word;
        }

        .user-message {
            background-color: #2874f0;
            color: white;
            align-self: flex-end;
            text-align: right;
        }

        .bot-message {
            background-color: #ececec;
            align-self: flex-start;
            text-align: left;
        }

        .input-container {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        button {
            padding: 10px 15px;
            border: none;
            background-color: #2874f0;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        @media (max-width: 500px) {
            .chat-container {
                height: 350px;
            }

            .chat-box {
                height: 250px;
            }
        }
    </style>
</head>

<body>

    <div class="chat-container">
        <h3>Help Chatbot</h3>
        <div class="chat-box" id="chat-box">
            <p class="bot-message"><strong>Bot:</strong> Hello! How can I assist you?</p>
        </div>
        <div class="input-container">
            <input type="text" id="user-input" placeholder="Type a message..." required>
            <button id="send-btn">Send</button>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#send-btn").click(function() {
                var userMessage = $("#user-input").val().trim();
                if (userMessage === "") return;

                var chatBox = $("#chat-box");

                // Display user message
                chatBox.append("<p class='user-message'><strong>You:</strong> " + userMessage + "</p>");
                $("#user-input").val("");

                // AJAX request to message.php
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: {
                        text: userMessage
                    },
                    success: function(response) {
                        chatBox.append("<p class='bot-message'><strong>Bot:</strong> " + response + "</p>");
                        chatBox.scrollTop(chatBox[0].scrollHeight);
                    }
                });
            });
        });
    </script>

</body>

</html>
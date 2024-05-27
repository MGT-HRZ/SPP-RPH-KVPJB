<?php

    $gmail_Receiver_content_form = '

        <html>
            <head>
                <style>
                    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");
                    * {
                        font-family: "Montserrat", sans-serif;
                    }
                    body {
                        font-family: "Arial", sans-serif;
                        background-color: #f8f9fa;
                        margin: 0;
                        padding: 0;
                    }
                    .email-container {
                        max-width: 600px;
                        margin: auto;
                        padding: 20px;
                        background-color: #ffffff;
                        border: 1px solid #ced4da;
                        border-radius: 30px; /* Adjust border-radius as needed */
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    }
                    #spp-rph-ico {
                        width: 100px;

                        /* Cannot drag image */
                        -webkit-user-drag: none;
                        -khtml-user-drag: none;
                        -moz-user-drag: none;
                        user-select: none;
                    }
                    table {
                        width: 100%;
                    }
                    h3, h4 {
                        color: #007bff;
                        margin-top: 0;
                    }
                    button.rounded-pill, input.rounded-pill {
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 600;
                        text-align: center;
                        white-space: nowrap;
                        cursor: pointer;
                        border: 1px solid #ced4da; /* Add border style */
                        border-radius: 50px; /* Apply rounded-pill */
                        height: 48px; /* Match the height of the input */
                    }
                    .sender-name-rounded-pill, .link-rph-rounded-pill {
                        padding: 10px;
                        font-size: 16px;
                        font-weight: 600;
                        white-space: nowrap;
                        cursor: pointer;
                        border: 1px solid #ced4da; /* Add border style */
                        border-radius: 50px; /* Apply rounded-pill */
                        height: 48px; /* Match the height of the input */
                    }
                    button {
                        background-color: #007bff;
                        color: #fff;
                        text-decoration: none;
                        display: inline-block; /* Ensure inline display for sizing */
                        width: 100%; /* Make the button full width */
                        box-sizing: border-box;
                        margin-top: 10px; /* Adjust top margin */
                    }
                    #tahun, #minggu, #sesi {
                        width: 100%; /* Make the input full width */
                        box-sizing: border-box;
                        margin-top: 10px; /* Adjust top margin */
                        margin-bottom: 10px; /* Adjust bottom margin */
                    }
                    #sender_name, #link_rph {
                        width: 100%; /* Make the input full width */
                        box-sizing: border-box;
                        margin-top: 10px; /* Adjust top margin */
                    }
                    .form-group {
                        margin-bottom: 20px;
                    }
                    .form-group label {
                        display: block;
                        font-size: 16px;
                        font-weight: 600;
                        margin-bottom: 5px;
                    }
                    .form-header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                </style>
            </head>
            <body>
                <center>
                <p>
                    <h2 style="margin-bottom: 8%;">
                        Below is the link and file that the lecturer already attached for the week. Feel free to open it!
                    </h2>
                </p>
                </center>
                <div class="email-container">
                    <form>
                        <div class="form-header">
                            <img src="https://meimluonline.github.io/images.meimlu.github.io/icon/e-RPH%20Traker%20Logo.png" id="spp-rph-ico" alt="icon">
                            <h3 style="margin-top: 10px; color: black;">
                                SPP-RPH Email Notification
                            </h3>
                            <h3>Attachment Information</h3>
                        </div>
                        <table>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="sender_name">Attachment From:</label>
                                        <input type="text" id="sender_name" name="sender_name" value="'.$sender_name.'" disabled class="sender-name-rounded-pill">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="tahun">Year:</label>
                                        <input type="text" id="tahun" name="tahun" value="'.$tahun.'" disabled class="rounded-pill">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="sesi">Session:</label>
                                        <input type="text" id="sesi" name="sesi" value="'.$sesi.'" disabled class="rounded-pill">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="minggu">Week:</label>
                                        <input type="text" id="minggu" name="minggu" value="'.$minggu.'" disabled class="rounded-pill">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="link_rph">Attachment Link:</label>
                                        <input type="text" id="link_rph" name="link_rph" value="'.$link_rph.'" disabled class="link-rph-rounded-pill">
                                        <a href="'.$link_rph.'" style="color: #fff; text-decoration: none;"><button type="button" class="rounded-pill">View Attachment</button></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="spp_rph_link">SPP-RPH Link:</label>
                                        <a href="https://spp-rph.meimlu.site" style="color: #fff; text-decoration: none;"><button type="button" class="rounded-pill">Visit SPP-RPH</button></a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <p style="margin-top: 8%;">Reference Link : ('.$link_rph.')</p>
            </body>
        </html>
    ';
    
?>
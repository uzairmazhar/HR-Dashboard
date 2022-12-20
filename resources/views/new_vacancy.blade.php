@extends('layouts.ers-layout')
@section('header')
{{--    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">--}}
@endsection
<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            #ft-form {
                font-family: inherit;
                font-size: 100%;
                line-height: 1.15
            }
            #ft-form *,
            #ft-form ::after,
            #ft-form ::before {
                box-sizing: border-box
            }
            #ft-form input,
            #ft-form select,
            #ft-form textarea {
                font-family: inherit;
                font-size: 100%;
                line-height: 1.15;
                margin: 0
            }
            #ft-form select {
                text-transform: none
            }
            #ft-form [type=submit] {
                -webkit-appearance: button
            }
            #ft-form legend {
                padding: 0
            }
            #ft-form h2,
            #ft-form p {
                margin: 0
            }
            #ft-form fieldset {
                margin: 0;
                padding: 0
            }
            #ft-form html {
                font-family: ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
                line-height: 1.5
            }
            #ft-form body {
                font-family: inherit;
                line-height: inherit
            }
            #ft-form *,
            #ft-form ::after,
            #ft-form ::before {
                box-sizing: border-box;
                border-width: 0;
                border-style: solid;
                border-color: #e5e7eb
            }
            #ft-form textarea {
                resize: vertical
            }
            #ft-form input::-moz-placeholder,
            #ft-form textarea::-moz-placeholder {
                color: #9ca3af
            }
            #ft-form input:-ms-input-placeholder,
            #ft-form textarea:-ms-input-placeholder {
                color: #9ca3af
            }
            #ft-form input::placeholder,
            #ft-form textarea::placeholder {
                color: #9ca3af
            }
            #ft-form h2 {
                font-size: inherit;
                font-weight: inherit
            }
            #ft-form input,
            #ft-form select,
            #ft-form textarea {
                padding: 0;
                line-height: inherit;
                color: inherit
            }
            #ft-form [type=date],
            #ft-form [type=email],
            #ft-form [type=tel],
            #ft-form [type=text],
            #ft-form select,
            #ft-form textarea {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-color: #fff;
                border-color: #6b7280;
                border-width: 1px;
                border-radius: 0;
                padding-top: .5rem;
                padding-right: .75rem;
                padding-bottom: .5rem;
                padding-left: .75rem;
                font-size: 1rem;
                line-height: 1.5rem
            }
            #ft-form [type=date]:focus,
            #ft-form [type=email]:focus,
            #ft-form [type=tel]:focus,
            #ft-form [type=text]:focus,
            #ft-form select:focus,
            #ft-form textarea:focus {
                outline: 2px solid transparent;
                outline-offset: 2px;
                box-shadow: 0 0 0 0 #fff, 0 0 0 3px rgba(199,210,254,.5), 0 0 #0000;
                border-color: #2563eb
            }
            #ft-form input::-moz-placeholder,
            #ft-form textarea::-moz-placeholder {
                color: #6b7280;
                opacity: 1
            }
            #ft-form input:-ms-input-placeholder,
            #ft-form textarea:-ms-input-placeholder {
                color: #6b7280;
                opacity: 1
            }
            #ft-form input::placeholder,
            #ft-form textarea::placeholder {
                color: #6b7280;
                opacity: 1
            }
            #ft-form select {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
                background-position: right .5rem center;
                background-repeat: no-repeat;
                background-size: 1.5em 1.5em;
                padding-right: 2.5rem;
                -webkit-print-color-adjust: exact;
                color-adjust: exact
            }
            #ft-form [type=checkbox],
            #ft-form [type=radio] {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                padding: 0;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
                display: inline-block;
                vertical-align: middle;
                background-origin: border-box;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                flex-shrink: 0;
                height: 1rem;
                width: 1rem;
                color: #2563eb;
                background-color: #fff;
                border-color: #6b7280;
                border-width: 1px
            }
            #ft-form [type=checkbox] {
                border-radius: 0
            }
            #ft-form [type=radio] {
                border-radius: 100%
            }
            #ft-form [type=checkbox]:focus,
            #ft-form [type=radio]:focus {
                outline: 2px solid transparent;
                outline-offset: 2px;
                box-shadow: 0 0 0 0 #fff, 0 0 0 3px rgba(199,210,254,.5), 0 0 #0000;
            }
            #ft-form [type=checkbox]:checked,
            #ft-form [type=radio]:checked {
                border-color: transparent;
                background-color: currentColor;
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat
            }
            #ft-form [type=checkbox]:checked {
                background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e")
            }
            #ft-form [type=radio]:checked {
                background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e")
            }
            #ft-form [type=checkbox]:checked:focus,
            #ft-form [type=checkbox]:checked:hover,
            #ft-form [type=radio]:checked:focus,
            #ft-form [type=radio]:checked:hover {
                border-color: transparent;
                background-color: currentColor
            }
            #ft-form [type=checkbox]:indeterminate {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");
                border-color: transparent;
                background-color: currentColor;
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat
            }
            #ft-form [type=checkbox]:indeterminate:focus,
            #ft-form [type=checkbox]:indeterminate:hover {
                border-color: transparent;
                background-color: currentColor
            }
            #ft-form [type=file] {
                background: unset;
                border-color: inherit;
                border-width: 0;
                border-radius: 0;
                padding: 0;
                font-size: unset;
                line-height: inherit
            }
            #ft-form [type=file]:focus {
                outline: 1px auto -webkit-focus-ring-color
            }
            #ft-form fieldset {
                font-size: 100%;
                margin-top: 3rem;
                margin-bottom: 1.5rem
            }
            #ft-form fieldset:first-child {
                margin-top: 0
            }
            #ft-form fieldset > * {
                display: block;
                margin-bottom: 1.5rem
            }
            #ft-form fieldset > :last-child {
                margin-bottom: 0
            }
            #ft-form fieldset > .two-cols > * {
                display: block;
                margin-bottom: 1.5rem
            }
            #ft-form fieldset > .two-cols > :last-child {
                margin-bottom: 0
            }
            @media only screen and (min-width:640px) {
                #ft-form fieldset > .two-cols {
                    display: flex;
                    align-items: flex-end
                }
                #ft-form fieldset > .two-cols > * {
                    display: block;
                    margin-right: 1.5rem;
                    margin-top: 0;
                    margin-bottom: 0;
                    flex: 1
                }
                #ft-form fieldset > .two-cols > :last-child {
                    margin-right: 0
                }
            }
            #ft-form fieldset div > label {
                display: inline-flex;
                align-items: flex-start;
                margin-top: .5rem;
                width: 100%
            }
            #ft-form fieldset div > label:last-child {
                margin: .5rem 0 0 0
            }
            #ft-form fieldset div.inline {
                padding: .55rem 0 0;
                width: 100%
            }
            #ft-form fieldset div.inline > label {
                width: auto;
                margin-right: .5rem
            }
            #ft-form fieldset div.inline > label:last-child {
                margin-right: 0
            }
            #ft-form fieldset > .two-cols div.inline {
                padding: .55rem 0
            }
            #ft-form fieldset > legend {
                font-weight: 700;
                font-size: 120%;
                margin-bottom: 1rem
            }
            #ft-form fieldset > p {
                margin: 0
            }
            #ft-form [type=file] {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-color: #fff;
                border-color: #6b7280;
                border-width: 1px;
                border-radius: 0;
                padding-top: .5rem;
                padding-right: .75rem;
                padding-bottom: .5rem;
                padding-left: .75rem;
                font-size: 1rem;
                line-height: 1.5rem
            }
            #ft-form [type=file]:focus {
                outline: 2px solid transparent;
                outline-offset: 2px;
                box-shadow: 0 0 0 0 #fff, 0 0 0 3px rgba(199,210,254,.5), 0 0 #0000;
                border-color: #2563eb
            }
            #ft-form [multiple],
            #ft-form [type=date],
            #ft-form [type=datetime-local],
            #ft-form [type=email],
            #ft-form [type=file],
            #ft-form [type=month],
            #ft-form [type=number],
            #ft-form [type=password],
            #ft-form [type=search],
            #ft-form [type=tel],
            #ft-form [type=text],
            #ft-form [type=time],
            #ft-form [type=url],
            #ft-form [type=week],
            #ft-form select,
            #ft-form textarea {
                border-radius: .375rem;
                margin-top: .25rem;
                box-shadow: 0 0 #0000,0 0 #0000,0 1px 2px 0 rgba(0,0,0,.05);
                border-color: #bbb;
                width: 100%
            }
            #ft-form [multiple] select,
            #ft-form [type=date] select,
            #ft-form [type=datetime-local] select,
            #ft-form [type=email] select,
            #ft-form [type=file] select,
            #ft-form [type=month] select,
            #ft-form [type=number] select,
            #ft-form [type=password] select,
            #ft-form [type=search] select,
            #ft-form [type=tel] select,
            #ft-form [type=text] select,
            #ft-form [type=time] select,
            #ft-form [type=url] select,
            #ft-form [type=week] select,
            #ft-form select select,
            #ft-form textarea select {
                padding-right: 2.5rem
            }
            #ft-form [multiple]:focus,
            #ft-form [type=date]:focus,
            #ft-form [type=datetime-local]:focus,
            #ft-form [type=email]:focus,
            #ft-form [type=file]:focus,
            #ft-form [type=month]:focus,
            #ft-form [type=number]:focus,
            #ft-form [type=password]:focus,
            #ft-form [type=search]:focus,
            #ft-form [type=tel]:focus,
            #ft-form [type=text]:focus,
            #ft-form [type=time]:focus,
            #ft-form [type=url]:focus,
            #ft-form [type=week]:focus,
            #ft-form select:focus,
            #ft-form textarea:focus {
                border-color: #bbb;
                box-shadow: 0 0 0 0 #fff,0 0 0 3px rgba(199,210,254,.5),0 0 #0000
            }
            #ft-form [type=checkbox],
            #ft-form [type=radio] {
                color: #4f46e5;
                box-shadow: none;
                border-radius: .25rem;
                border-color: #bbb;
                margin-right: .5rem
            }
            #ft-form [type=checkbox]:focus,
            #ft-form [type=radio]:focus {
                border-color: #bbb;
                box-shadow: 0 0 0 0 #fff,0 0 0 3px rgba(199,210,254,.5),0 0 #0000
            }
            #ft-form [type=radio] {
                border-radius: 100%
            }
            #ft-form .btns {
                text-align: right;
                margin-top: 3rem
            }
            #ft-form .btns > input[type=button],
            #ft-form .btns > input[type=reset],
            #ft-form .btns > input[type=submit] {
                display: inline-block;
                box-shadow: 0 0 #0000,0 0 #0000,0 1px 2px 0 rgba(0,0,0,.05);
                padding-left: 1.5rem;
                padding-right: 1.5rem;
                padding-top: .6rem;
                padding-bottom: .6rem;
                line-height: 1.25rem;
                border-width: 1px;
                border-radius: .375rem;
                border-color: #bbb;
                background-color: #fff;
                cursor: pointer;
                margin-left: .5rem;
                font-weight: 700
            }
            #ft-form .btns > input[type=button]:focus,
            #ft-form .btns > input[type=reset]:focus,
            #ft-form .btns > input[type=submit]:focus {
                outline: 2px solid transparent;
                outline-offset: 2px;
                border-color: #bbb;
                box-shadow: 0 0 0 2px #fff,0 0 0 4px rgba(199,210,254,.5),0 0 #0000
            }
            #ft-form .btns > input[type=submit] {
                background-color: #f3f4f5;
                transition: background-color .1s
            }
            #ft-form .btns > input[type=submit]:hover {
                background-color: #f8f9fa
            }
        </style>

    </head>
    <body>
    <form action="SEND ADDRESS" id="ft-form" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        <fieldset>
            <legend>Job</legend>
            <label>
                Application for *
                <select name="Application for" required>
                    <option>Job A</option>
                    <option>Job B</option>
                </select>
            </label>
        </fieldset>
        <fieldset>
            <legend>Personal data</legend>
            <div class="two-cols">
                <label>
                    First name *
                    <input type="text" name="First name" required>
                </label>
                <label>
                    Family name *
                    <input type="text" name="Family name" required>
                </label>
            </div>
            <div class="two-cols">
                <label>
                    Citizenship
                    <input type="text" name="Citizenship">
                </label>
                <label>
                    Date of birth
                    <input type="date" name="Date of birth">
                </label>
            </div>
            <label>
                Address
                <input type="text" name="Address">
            </label>
            <div class="two-cols">
                <label>
                    ZIP Code
                    <input type="text" name="ZIP">
                </label>
                <label>
                    City
                    <input type="text" name="City">
                </label>
            </div>
            <div class="two-cols">
                <label>
                    Phone *
                    <input type="tel" name="Phone" required>
                </label>
                <label>
                    Email address *
                    <input type="email" name="Email" required>
                </label>
            </div>
        </fieldset>
        <fieldset>
            <legend>Application documents</legend>
            <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
            <div class="two-cols">
                <label>
                    Application letter
                    <input type="file" name="Application letter" accept=".doc,.docx,.pdf">
                </label>
                <label>
                    Curriculum vitae
                    <input type="file" name="Curriculum vitae" accept=".doc,.docx,.pdf">
                </label>
            </div>
            <p>Possible file types: DOC, PDF. Maximum file size: 10 MB.</p>
        </fieldset>
        <div class="btns">
            <input type="text" name="_gotcha" value="" style="display:none;">
            <input type="submit" value="Submit application">
        </div>
    </form>
</body>
</html>

<script>
    function validate(val) {
        v1 = document.getElementById("fname");
        v2 = document.getElementById("lname");
        v3 = document.getElementById("email");
        v4 = document.getElementById("mob");
        v5 = document.getElementById("job");
        v6 = document.getElementById("ans");

        flag1 = true;
        flag2 = true;
        flag3 = true;
        flag4 = true;
        flag5 = true;
        flag6 = true;

        if(val>=1 || val==0) {
            if(v1.value == "") {
                v1.style.borderColor = "red";
                flag1 = false;
            }
            else {
                v1.style.borderColor = "green";
                flag1 = true;
            }
        }

        if(val>=2 || val==0) {
            if(v2.value == "") {
                v2.style.borderColor = "red";
                flag2 = false;
            }
            else {
                v2.style.borderColor = "green";
                flag2 = true;
            }
        }
        if(val>=3 || val==0) {
            if(v3.value == "") {
                v3.style.borderColor = "red";
                flag3 = false;
            }
            else {
                v3.style.borderColor = "green";
                flag3 = true;
            }
        }
        if(val>=4 || val==0) {
            if(v4.value == "") {
                v4.style.borderColor = "red";
                flag4 = false;
            }
            else {
                v4.style.borderColor = "green";
                flag4 = true;
            }
        }
        if(val>=5 || val==0) {
            if(v5.value == "") {
                v5.style.borderColor = "red";
                flag5 = false;
            }
            else {
                v5.style.borderColor = "green";
                flag5 = true;
            }
        }
        if(val>=6 || val==0) {
            if(v6.value == "") {
                v6.style.borderColor = "red";
                flag6 = false;
            }
            else {
                v6.style.borderColor = "green";
                flag6 = true;
            }
        }

        flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;

        return flag;
    }
</script>


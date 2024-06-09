<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Submission</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #2b1d1b;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            width: 500px;
            padding: 20px;
            background-color: #3e2d2b;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #d4b28c;
        }
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            margin-bottom: 10px;
        }
        .file-input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .file-input-label {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6f4e37;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .file-input-label:hover {
            background-color: #8a5a44;
        }
        .file-input:valid + .file-input-label {
            background-color: #ff6f61;
        }
        .submit-btn {
            padding: 10px 20px;
            font-size: 1em;
            color: #ffffff;
            background-color: #6f4e37;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #8a5a44;
        }
        .submit-btn:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(111, 78, 55, 0.7);
        }
    </style>
</head>
<body>
    <form action="{{ route('documentsubmissionCall') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="document_image">Document:</label>
        <div class="file-input-wrapper">
            <input type="file" id="document_image" name="document_image" accept="image/*" class="file-input" required>
            <label for="document_image" class="file-input-label">Choose File</label>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
        @if(Auth::user()->account_type==0)
            <h2>SUBMIT YOUR IDENTITY CARD</h2>
        @elseif(Auth::user()->account_type==1)
            <h2>SUBMIT YOUR LICENCE DOCUMENT</h2>
        @endif
    </form>
    
</body>
</html>

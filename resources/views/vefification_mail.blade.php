<html>
    <body>
        <div>
            <p>Hi ! {{$user->user_name}}</p>
            <p>You Account has been created. Please click the link bellow and verify</p>
            <a href="{{route('verify-email',$user->email_verification_token)}}">Click To Verify</a>
            <br/>
            <b>Thank you</b>
        </div>
    </body>
</html>
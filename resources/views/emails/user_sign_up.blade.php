@extends('emails.email_base')

@section('content')
    <tr class="email_content">
        <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <h1>Vital Next Steps to Start Your Business</h1>
                        <p>Congratulations and welcome to eBiyaheAffiliate! We are thrilled you joined us. We look
                            forward to partnering with you as you take the steps to realize the potential this business offers
                            and to "Leave Your Legacy." We will help you every step of the way. <span style="color: #00acef;"><strong>Read this entire email so
                                you will stay on track!</strong></span></p>

                       <p><span style="color: #00acef;"><strong>Our Admin is Currently Reviewing your membership status! You will receive a separate email once you're approved. </strong></span></p>

                        <div style="background: #ececec; margin: 0 -40px; padding: 15px 40px; margin-bottom: 20px;">
                            <h3>Your eBiyaheAffiliate Dashboard</h3>
                            <p>We are pleased to introduce you to a powerful, comprehensive business-building tool called the
                                Legacy Network Dashboard. Your Dashboard will help you prioritize important business building
                                activities and manage your Transactions with ease! </p>
                            <ol>
                                <li>
                                    Login to your Dashboard
                                        <ul>
                                            <li>Dashboard Website Address: <a href="{{ url('login') }}">ebiyaheaffiliate.com/login</a></li>
                                        </ul>
                                </li>
                                <li>
                                    Your Dashboard login information is:
                                    <ul>
                                        <li><strong>Username:</strong> Your Email Used</li>
                                        <li><strong>Password:</strong> The password you selected when you enrolled into LN. </li>
                                    </ul>
                                </li>
                            </ol>
                        </div>


                        <p>To your success,<br>
                            eBiyaheAffiliate Team
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
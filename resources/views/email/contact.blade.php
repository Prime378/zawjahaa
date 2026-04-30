<div style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 30px;">
    
    <div style="max-width: 600px; margin: auto; background: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
        
        <!-- Header -->
        <div style="background: #d63384; padding: 20px; text-align: center; color: #ffffff;">
            <h2 style="margin: 0;">💍 New Matchmaking Request</h2>
            <p style="margin: 5px 0 0;">Zawjahaa Contact Form Submission</p>
        </div>

        <!-- Body -->
        <div style="padding: 25px; color: #333;">
            
            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
                <tr style="border-bottom: 1px solid #eee;">
                    <td><strong>Full Name:</strong></td>
                    <td>{{ $data['full_name'] }}</td>
                </tr>

                <tr style="border-bottom: 1px solid #eee;">
                    <td><strong>Email:</strong></td>
                    <td>{{ $data['email'] }}</td>
                </tr>

                <tr style="border-bottom: 1px solid #eee;">
                    <td><strong>Phone:</strong></td>
                    <td>{{ $data['phone'] }}</td>
                </tr>

                <tr style="border-bottom: 1px solid #eee;">
                    <td><strong>Looking For:</strong></td>
                    <td>{{ $data['looking_for'] ?? 'N/A' }}</td>
                </tr>

                <tr style="border-bottom: 1px solid #eee;">
                    <td><strong>Age:</strong></td>
                    <td>{{ $data['age'] ?? 'N/A' }}</td>
                </tr>

                <tr style="border-bottom: 1px solid #eee;">
                    <td><strong>Location:</strong></td>
                    <td>{{ $data['location'] ?? 'N/A' }}</td>
                </tr>

                <tr style="border-bottom: 1px solid #eee;">
                    <td><strong>Profession:</strong></td>
                    <td>{{ $data['profession'] ?? 'N/A' }}</td>
                </tr>

                <tr style="border-bottom: 1px solid #eee;">
                    <td><strong>Service:</strong></td>
                    <td>{{ $data['service'] ?? 'N/A' }}</td>
                </tr>
            </table>

            @if(!empty($data['message']))
            <div style="margin-top: 20px;">
                <strong>Additional Message:</strong>
                <p style="background: #f8f9fa; padding: 15px; border-radius: 6px; margin-top: 8px;">
                    {{ $data['message'] }}
                </p>
            </div>
            @endif

        </div>

        <!-- Footer -->
        <div style="background: #f8f9fa; padding: 15px; text-align: center; font-size: 13px; color: #777;">
            This message was sent from <strong>Zawjahaa.com</strong><br>
            © {{ date('Y') }} Zawjahaa. All rights reserved.
        </div>

    </div>
</div>
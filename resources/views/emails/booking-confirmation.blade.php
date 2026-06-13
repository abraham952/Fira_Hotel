<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - FiraHotel</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background-color: #FAF8F5;">
    <table role="presentation" style="width: 100%; border-collapse: collapse;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table role="presentation" style="max-width: 600px; width: 100%; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(26, 24, 22, 0.1);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #0A2463 0%, #1A3A7D 100%); padding: 40px 30px; text-align: center;">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #D4AF37, #B59A6A); border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 16px;">
                                <span style="color: white; font-size: 28px; font-weight: bold;">F</span>
                            </div>
                            <h1 style="margin: 0; color: white; font-family: 'Playfair Display', Georgia, serif; font-size: 32px; font-weight: 400;">FiraHotel</h1>
                            <p style="margin: 8px 0 0; color: rgba(255,255,255,0.8); font-size: 14px; letter-spacing: 0.2em; text-transform: uppercase;">Ethiopian Luxury</p>
                        </td>
                    </tr>
                    
                    <!-- Confirmation Message -->
                    <tr>
                        <td style="padding: 40px 30px; text-align: center; border-bottom: 1px solid #E5E3DC;">
                            <div style="width: 64px; height: 64px; background: #2E8B57; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h2 style="margin: 0 0 12px; color: #1A1816; font-family: 'Playfair Display', Georgia, serif; font-size: 28px; font-weight: 400;">Booking Confirmed!</h2>
                            <p style="margin: 0; color: #6B6560; font-size: 16px; line-height: 1.6;">Thank you for choosing FiraHotel. We look forward to welcoming you.</p>
                        </td>
                    </tr>
                    
                    <!-- Booking Details -->
                    <tr>
                        <td style="padding: 30px;">
                            <div style="background: #FAF8F5; border-radius: 12px; padding: 24px; margin-bottom: 24px;">
                                <h3 style="margin: 0 0 16px; color: #C9A961; font-size: 12px; letter-spacing: 0.2em; text-transform: uppercase; font-weight: 600;">Booking Reference</h3>
                                <p style="margin: 0; color: #1A1816; font-size: 24px; font-weight: 600; font-family: monospace;">{{ $booking->booking_reference }}</p>
                            </div>
                            
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 16px 0; border-bottom: 1px solid #E5E3DC;">
                                        <p style="margin: 0 0 4px; color: #6B6560; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase;">Guest Name</p>
                                        <p style="margin: 0; color: #1A1816; font-size: 16px; font-weight: 500;">{{ $booking->guest_name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 0; border-bottom: 1px solid #E5E3DC;">
                                        <p style="margin: 0 0 4px; color: #6B6560; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase;">Room</p>
                                        <p style="margin: 0; color: #1A1816; font-size: 16px; font-weight: 500;">{{ $booking->room->getTranslatedName() }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 0; border-bottom: 1px solid #E5E3DC;">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="width: 50%;">
                                                    <p style="margin: 0 0 4px; color: #6B6560; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase;">Check-in</p>
                                                    <p style="margin: 0; color: #1A1816; font-size: 16px; font-weight: 500;">{{ \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') }}</p>
                                                </td>
                                                <td style="width: 50%;">
                                                    <p style="margin: 0 0 4px; color: #6B6560; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase;">Check-out</p>
                                                    <p style="margin: 0; color: #1A1816; font-size: 16px; font-weight: 500;">{{ \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 0; border-bottom: 1px solid #E5E3DC;">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="width: 50%;">
                                                    <p style="margin: 0 0 4px; color: #6B6560; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase;">Adults</p>
                                                    <p style="margin: 0; color: #1A1816; font-size: 16px; font-weight: 500;">{{ $booking->adults }}</p>
                                                </td>
                                                <td style="width: 50%;">
                                                    <p style="margin: 0 0 4px; color: #6B6560; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase;">Children</p>
                                                    <p style="margin: 0; color: #1A1816; font-size: 16px; font-weight: 500;">{{ $booking->children ?? 0 }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 0;">
                                        <p style="margin: 0 0 4px; color: #6B6560; font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase;">Total Amount</p>
                                        <p style="margin: 0; color: #C9A961; font-size: 24px; font-weight: 600;">${{ number_format($booking->total_price, 2) }}</p>
                                        <p style="margin: 4px 0 0; color: #6B6560; font-size: 13px;">Payment due upon arrival</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Important Information -->
                    <tr>
                        <td style="padding: 30px; background: #F8F9FA; border-top: 1px solid #E5E3DC;">
                            <h3 style="margin: 0 0 16px; color: #1A1816; font-size: 16px; font-weight: 600;">Important Information</h3>
                            <ul style="margin: 0; padding-left: 20px; color: #6B6560; font-size: 14px; line-height: 1.8;">
                                <li>Check-in time: 2:00 PM</li>
                                <li>Check-out time: 12:00 PM</li>
                                <li>Payment will be collected upon arrival</li>
                                <li>Please bring a valid ID and this confirmation</li>
                                <li>Cancellation policy: Free cancellation up to 48 hours before check-in</li>
                            </ul>
                        </td>
                    </tr>
                    
                    <!-- Contact -->
                    <tr>
                        <td style="padding: 30px; text-align: center; border-top: 1px solid #E5E3DC;">
                            <p style="margin: 0 0 12px; color: #6B6560; font-size: 14px;">Need to modify your booking?</p>
                            <a href="mailto:reservations@firahotel.com" style="display: inline-block; padding: 12px 24px; background: #D4AF37; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 14px; letter-spacing: 0.05em;">Contact Us</a>
                            <p style="margin: 16px 0 0; color: #6B6560; font-size: 14px;">
                                <a href="tel:+251112345678" style="color: #C9A961; text-decoration: none;">+251 11 234 5678</a> | 
                                <a href="mailto:reservations@firahotel.com" style="color: #C9A961; text-decoration: none;">reservations@firahotel.com</a>
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 24px 30px; background: #0A2463; text-align: center;">
                            <p style="margin: 0; color: rgba(255,255,255,0.7); font-size: 12px; line-height: 1.6;">
                                FiraHotel | Addis Ababa, Ethiopia<br>
                                © {{ date('Y') }} FiraHotel. All rights reserved.
                            </p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

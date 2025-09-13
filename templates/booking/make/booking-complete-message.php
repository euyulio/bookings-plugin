<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<p>
	<?php
	if ( $booking->get_status() === 'pending' ) :
		/* translators: %s: listing title. */
		printf('Su solicitud de cita para "%s" ha sido enviada, será procesada y lo contactaremos lo antes posible. Cuando la cita sea aprobada, recibiras un correo electrónico.<br><br>
		No olvide hacer el pago (de ser el caso) mediante depósito en efectivo o transferencia bancaria, con una antelación de al menos 72 horas, en la cuenta cuyos datos se detallan a continuación:<br><br>
<em>*Colocar como concepto de la transferencia el ID de la cita:</em> <b>'. $booking->get_id() . '</b><br><br>
Beneficiario: <b>Embajada de Venezuela</b><br>
Banco: <b>Bank Austria</b><br>
IBAN: <b>AT52 1200 0095 2377 0704</b><br>
BIC: <b>BKAUATWW</b><br>
Concepto: <b>Cita: '. $booking->get_id() . '</b><br><br>
<h4 style="text-align: center; color: red;"> Recuerda que tienes que esperar a que tu cita sea aprobada para que puedas acercarte a la Sección Consular en la Fecha solicitada.</h4><br>', $listing->get_title() );
	else :
		/* translators: %1$s: listing title, %2$s: booking number. */
		printf( esc_html__( 'Thank you! Your booking of "%1$s" has been confirmed, the booking reference number is %2$s.', 'hivepress-bookings' ), $listing->get_title(), '#' . $booking->get_id() );
	endif;
	?>
</p>
<button type="button" class="button button--primary alt" data-component="link" data-url="<?php echo esc_url( hivepress()->router->get_url( 'booking_view_page', [ 'booking_id' => $booking->get_id() ] ) ); ?>"><?php esc_html_e( 'View Booking', 'hivepress-bookings' ); ?></button>
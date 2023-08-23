<x-layout>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <div class="contact-page">
        <h1>Contact Us</h1>
        <p>If you have any questions or inquiries about our online courses, feel free to contact us using the information below:</p>

        <div class="contact-info">
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <p>Email: contact@example.com</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <p>Phone: +123-456-7890</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <p>Address: 123 Main Street, City, Country</p>
            </div>
        </div>

        <h2>Reach Out to Us</h2>
        <form class="contact-form" action="" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>
</x-layout>

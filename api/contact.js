import nodemailer from 'nodemailer';

export default async function handler(req, res) {
    if (req.method !== 'POST') {
        return res.status(405).json({ message: 'Method Not Allowed' });
    }

    const { name, email, message } = req.body;

    if (!name || !email || !message) {
        return res.status(400).json({ message: 'All fields are required' });
    }

    const transporter = nodemailer.createTransport({
        service: 'Gmail',
        auth: {
            user: process.env.MY_GMAIL,
            pass: process.env.GMAIL_APP_PASSWORD
        }
    });

    try {
        // Send notification to me
        await transporter.sendMail({
            from: email,
            to: process.env.MY_GMAIL,
            subject: `New Message from ${name}`,
            html: `<p><strong>Name:</strong> ${name}</p>
                   <p><strong>Email:</strong> ${email}</p>
                   <p><strong>Message:</strong><br>${message}</p>`
        });

        // Send confirmation to sender
        await transporter.sendMail({
            from: process.env.MY_GMAIL,
            to: email,
            subject: "Thank you for contacting Ian Mutwiri",
            html: `<p>Hi ${name},</p>
                   <p>Thank you for reaching out! I have received your message and will get back to you soon.</p>
                   <p><em>Your message:</em></p>
                   <blockquote>${message}</blockquote>
                   <p>Best regards,<br>Ian Mutwiri</p>`
        });

        res.status(200).json({ message: 'Message sent successfully!' });
    } catch (error) {
        res.status(500).json({ message: 'Failed to send message.' });
    }
}

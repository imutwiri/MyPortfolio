import nodemailer from 'nodemailer';

export default async function handler(req, res) {
    if (req.method !== 'POST') {
        return res.status(405).send('Method Not Allowed');
    }

    const { name, email, message } = req.body;

    if (!name || !email || !message) {
        return res.status(400).send('All fields are required');
    }

    const transporter = nodemailer.createTransport({
        service: 'Gmail',
        auth: {
            user: 'ianmutwiri37@gmail.com',
            pass: 'ytqb yibx fkud pdbq'
        }
    });

    try {
        await transporter.sendMail({
            from: email,
            to: 'ianmutwiri37@gmail.com',
            subject: `New Message from ${name}`,
            html: `<p><strong>Name:</strong> ${name}</p>
                   <p><strong>Email:</strong> ${email}</p>
                   <p><strong>Message:</strong><br>${message}</p>`
        });

        res.status(200).send('Message sent successfully!');
    } catch (error) {
        console.error(error);
        res.status(500).send('Failed to send email.');
    }
}

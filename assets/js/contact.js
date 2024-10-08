// api/contact.js
const sgMail = require('@sendgrid/mail');

// Initialize SendGrid with your API key
sgMail.setApiKey(process.env.SENDGRID_API_KEY); // Set your API key in Vercel environment variables

export default async function handler(req, res) {
  if (req.method === 'POST') {
    const { name, email, subject, message } = req.body;
    const msg = {
      to: 'femi.john.akinwunmi@gmail.com', // Change to your email address
      from: email, // Use the email address from the form
      subject: subject,
      text: message,
    };

    try {
      await sgMail.send(msg);
      return res.status(200).json({ status: 'success' });
    } catch (error) {
      return res.status(500).json({ status: 'error', message: error.message });
    }
  }
  return res.status(405).json({ status: 'error', message: 'Method Not Allowed' });
}

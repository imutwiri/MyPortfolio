# Ian Mutwiri | Software Developer Portfolio

This is my personal portfolio website, built to showcase my projects, skills, and experience as a Computer Scientist and Software Developer.

## 🌐 Live Demo

[View Portfolio Live](https://mutwiri-dev.vercel.app/) 

## 🚀 Features

- Responsive design using [Tailwind CSS](https://tailwindcss.com/)
- Dark mode / Light mode toggle (remembers your preference)
- Animated particles background (visible on all devices)
- Project showcase with links to live demos and code
- Skills section with proficiency bars
- Contact form with toast notification and backend API integration
- Social and contact links

## 📁 Project Structure

```
/
├── api/
│   └── contact.js         # Node.js API handler for contact form (Vercel serverless function)
├── public/
│   ├── index.html         # Main portfolio page
│   ├── style.css
│   └── Images/
│       ├── pic.jpg
│       ├── favicon.ico
│       ├── Project1.png
│       ├── Project2.png
│       └── Project3.png
├── package.json           # (optional) For Node.js dependencies like nodemailer
└── README.md
```

## 🛠️ Technologies Used

- HTML5
- CSS3 (with Tailwind CSS)
- JavaScript (for interactivity, dark mode, and particles)
- [Font Awesome](https://fontawesome.com/) (icons)
- [particles.js](https://vincentgarreau.com/particles.js/) (background animation)
- Node.js (for API route)
- [nodemailer](https://nodemailer.com/) (for sending emails from contact form)
- Vercel (for deployment)

## 📦 Getting Started

1. **Clone the repository:**
   ```bash
   git clone https://github.com/imutwiri/MyPortfolio.git
   cd MyPortfolio
   ```

2. **Install dependencies (for API):**
   ```bash
   npm install
   ```

3. **Set up environment variables for email (if using nodemailer):**
   - On Vercel, add `MY_GMAIL` and `GMAIL_APP_PASSWORD` in your project settings.

4. **Deploy to Vercel:**
   - Make sure `/api/contact.js` is at the project root (not inside `/public`).
   - Deploy using the Vercel CLI:
     ```bash
     vercel
     ```
     - When prompted for the output/public directory, type: `public`
   - Or use the [Vercel Dashboard](https://vercel.com/dashboard).

5. **Open your deployed site and test the contact form.**

## ✏️ Customization

- Update `public/index.html` to add or edit your projects, skills, and contact info.
- Replace images in the `public/Images/` folder with your own.
- Edit `public/style.css` for custom styles.
- Update `/api/contact.js` for custom backend logic.

## 🤝 Connect with Me

- [GitHub](https://github.com/imutwiri)
- [LinkedIn](https://www.linkedin.com/in/ian-mutwiri-4a842a373)
- [Twitter/X](https://x.com/IanMutw63084874)
- [Instagram](https://www.instagram.com/_m.iano/?hl=en)
- Email: [ianmutwiri37@gmail.com](mailto:ianmutwiri37@gmail.com)

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

*Built with ❤️ by Ian Mutwiri*

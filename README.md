# Ian Mutwiri | Computer Scientist Portfolio

This is my personal portfolio website, designed to showcase my projects, skills, and experience as a Computer Scientist and Software Developer.

## 🌐 Live Demo

[View Portfolio Live](https://imutwiri.github.io/MyPortfolio/)

## 🚀 Features

- Responsive design using [Tailwind CSS](https://tailwindcss.com/)
- Dark mode / Light mode toggle (remembers your preference)
- Animated particles background (visible on all devices)
- Project showcase with links to live demos and code
- Skills section with proficiency bars
- Contact form connected to a database using PHP
- Social and contact links

## 📁 Project Structure

```
/
├── index.html
├── style.css
├── contact.php
├── Images/
│   ├── pic.jpg
│   ├── favicon.ico
│   ├── Project1.png
│   ├── Project2.png
│   └── Project3.png
└── (other assets)
```

## 🛠️ Technologies Used

- HTML5
- CSS3 (with Tailwind CSS)
- JavaScript (for interactivity and dark mode)
- [Font Awesome](https://fontawesome.com/) (icons)
- [particles.js](https://vincentgarreau.com/particles.js/) (background animation)
- PHP & MySQL (for contact form backend)

## 📦 Getting Started

1. **Clone the repository:**
   ```bash
   git clone https://github.com/imutwiri/MyPortfolio.git
   cd MyPortfolio
   ```

2. **Set up the database:**
   - Create a MySQL database named `portfolio`.
   - Create a table named `contacts`:
     ```sql
     CREATE TABLE contacts (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(100),
         email VARCHAR(100),
         message TEXT,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     ```

3. **Configure your PHP backend:**
   - Edit `contact.php` with your database credentials if needed.

4. **Run locally:**
   - Use a local server (e.g., XAMPP, WAMP, MAMP) to serve the project folder.

5. **Open `index.html` in your browser.**

## ✏️ Customization

- Update `index.html` to add or edit your projects, skills, and contact info.
- Replace images in the `Images/` folder with your own.
- Edit `style.css` for custom styles.

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

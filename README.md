# **XAMPP Custom Dashboard Guide**  

A step-by-step guide to setting up a custom dashboard for XAMPP on Linux (Fedora), Windows, or macOS.  

## **📌 Features**  
✅ Customizable homepage for XAMPP  
✅ Organize and manage local projects easily  
✅ Improve workflow efficiency  
✅ User-friendly and responsive design  

---

## **🛠️ Prerequisites**  
Before starting, make sure you have the following:  
- **XAMPP Installed** → [Download Here](https://www.apachefriends.org/)  
- Basic knowledge of HTML, PHP, and CSS (optional but helpful)  

---

## **📂 Installation & Setup**  

### **1️⃣ Locate the XAMPP `htdocs` Directory**  
By default, the web root directory for XAMPP is:  
- **Windows**: `C:\xampp\htdocs\`  
- **Linux (Fedora/Ubuntu)**: `/opt/lampp/htdocs/`  
- **macOS**: `/Applications/XAMPP/htdocs/`  

### **2️⃣ Create a New Project Folder**  
Run the following command in the terminal (Linux/macOS) or Command Prompt (Windows):  
```bash
mkdir /opt/lampp/htdocs/custom-dashboard  # Change path for Windows/macOS
```

### **3️⃣ Clone or Download This Repository**  
```bash
cd /opt/lampp/htdocs/custom-dashboard
git clone https://github.com/yourusername/custom-xampp-dashboard.git .
```
Or manually download the files and extract them into the `htdocs/custom-dashboard` folder.  

### **4️⃣ Set Proper Permissions (Linux Only)**  
If using Linux, set the correct folder permissions:  
```bash
sudo chown -R $USER:$USER /opt/lampp/htdocs/custom-dashboard
sudo chmod -R 755 /opt/lampp/htdocs/custom-dashboard
```

### **5️⃣ Configure XAMPP to Use the Custom Dashboard**  
Modify the **Apache configuration** to set your custom dashboard as the default XAMPP page.  
1. Open the `httpd.conf` file:  
   ```bash
   sudo nano /opt/lampp/etc/httpd.conf  # Linux
   ```
   or  
   ```
   C:\xampp\apache\conf\httpd.conf  # Windows
   ```
2. Find this line:  
   ```
   DocumentRoot "/opt/lampp/htdocs"
   Directory "/opt/lampp/htdocs"
   ```
3. Change it to your custom dashboard folder:  
   ```
   DocumentRoot "/opt/lampp/htdocs/custom-dashboard"
   Directory "/opt/lampp/htdocs/custom-dashboard"
   ```

4. Restart Apache:  
   ```bash
   sudo /opt/lampp/lampp restart  # Linux
   ```
   or  
   ```
   C:\xampp\xampp_restart.exe  # Windows
   ```

---

## **🎨 Customization**  
- Modify `index.php` to change the dashboard layout  
- Edit `style.css` to update the design  
- Add project links in `config.php`  

---

## **🚀 Usage**  
Open a browser and go to:  
```
http://localhost/
```
You should now see your custom XAMPP dashboard! 🎉  

---

## **🛠️ Troubleshooting**  
### ❌ *Dashboard Not Loading?*  
✔ Check Apache and MySQL services are running in the XAMPP control panel.  

### ❌ *Permission Denied Errors?*  
✔ Run:  
```bash
sudo chmod -R 777 /opt/lampp/htdocs/custom-dashboard
```
*(Not recommended for production!)*  

---

## **💡 Contributing**  
Feel free to submit pull requests or suggest improvements!  

---

## **📜 License**  
MIT License - Free to use and modify.  

---

## **📞 Support**  
For any issues, open a GitHub **Issue** or contact me at [your.email@example.com]  

---

Let me know if you want any modifications! 🚀

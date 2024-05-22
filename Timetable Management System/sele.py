from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
import chromedriver_autoinstaller
import time

AUTH_URL="http://localhost:3000/main.html"

try:
    print("Setting Up Chrome Options")
    options = Options()
    # options.add_argument("--headless")
    options.add_argument("--disable-gpu")
    options.add_argument("--log-level=3")
    options.add_argument("--silent")
    options.add_argument("--disable-logging")
    options.add_argument("--disable-dev-shm-usage")
    options.add_argument("--no-sandbox")
    options.add_argument("--disable-extensions")
    options.add_argument("--disable-software-rasterizer")
    options.add_argument('--ignore-certificate-errors')
    options.add_argument('--allow-running-insecure-content')
    user_agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.50 Safari/537.36'
    options.add_argument(f'user-agent={user_agent}')
    print("Setting up UC")
    chromedriver_autoinstaller.install()
    driver = webdriver.Chrome(options=options)
except Exception as e:
    print(e)
try:
    driver.maximize_window()
    driver.get(AUTH_URL)
    admin_btn= WebDriverWait(driver, 10).until(
            lambda driver: driver.find_element(by="id", value="admin-btn"))
    admin_btn.click()
    print("Admin Button Clicked")
    username_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="username"))
    username_field.click()
    username_field.send_keys("admin1")
    password_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="password"))
    password_field.click()
    password_field.send_keys("test")
    print("password Entered")
    login_btn= WebDriverWait(driver, 10).until(
            lambda driver: driver.find_element(by="id", value="login_button"))
    login_btn.click()
    print("login_btn clicked")
    course_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="course"))
    course_field.click()
    course_field.send_keys("TY ECO")
    print("course_field Entered")
    #new block
    theory_subjects_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="theory-subjects"))
    theory_subjects_field.click()
    theory_subjects_field.send_keys("ML,STQA,EME,CC,WSN")
    print("theory_subjects_field Entered")
    #new block
    practical_subjects_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="practical-subjects"))
    practical_subjects_field.click()
    practical_subjects_field.send_keys("MLL,STQAL,CCL,SHD,miniproject")
    print("practical_subjects_field Entered")
    #new block
    theory_faculties_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="theory-faculties"))
    theory_faculties_field.click()
    theory_faculties_field.send_keys("Faculty 1,Faculty 2,Faculty 3,Faculty 4,Faculty 5")
    print("theory_faculties_field Entered")
    #new block
    practical_faculties_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="practical-faculties"))
    practical_faculties_field.click()
    practical_faculties_field.send_keys("Faculty 1,Faculty 2,Faculty 3,Faculty 6,Faculty 7")
    print("practical_faculties_field Entered")
    #new block
    generate_btn= WebDriverWait(driver, 10).until(
            lambda driver: driver.find_element(by="id", value="generate_btn"))
    generate_btn.click()
    print("generate_btn clicked")
    time.sleep(10)
except Exception as e:
    print(e)

#testing student login
try:
    print("Testing Student Login")
    driver.maximize_window()
    driver.get(AUTH_URL)
    student_btn= WebDriverWait(driver, 10).until(
            lambda driver: driver.find_element(by="id", value="student-btn"))
    student_btn.click()
    print("Student Button Clicked")
    Student_username_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="username"))
    Student_username_field.click()
    Student_username_field.send_keys("student1")
    student_password_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="password"))
    student_password_field.click()
    student_password_field.send_keys("test")
    print("Student password Entered")
    student_login_btn= WebDriverWait(driver, 10).until(
            lambda driver: driver.find_element(by="id", value="student_login_btn"))
    student_login_btn.click()
    print("student_login_btn clicked")
    time.sleep(10)
except Exception as e:
    print(e)

#testing faculty login
try:
    print("Testing Faculty Login")
    driver.maximize_window()
    driver.get(AUTH_URL)
    faculty_btn= WebDriverWait(driver, 10).until(
            lambda driver: driver.find_element(by="id", value="faculty-btn"))
    faculty_btn.click()
    print("Faculty Button Clicked")
    faculty_username_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="username"))
    faculty_username_field.click()
    faculty_username_field.send_keys("faculty1")
    faculty_password_field = WebDriverWait(driver, 10).until(
        lambda driver: driver.find_element(by="id", value="password"))
    faculty_password_field.click()
    faculty_password_field.send_keys("test")
    print("Faculty password Entered")
    faculty_login_btn= WebDriverWait(driver, 10).until(
            lambda driver: driver.find_element(by="id", value="faculty_login_btn"))
    faculty_login_btn.click()
    print("Faculty login_btn clicked")
    time.sleep(10)
except Exception as e:
    print(e)

  

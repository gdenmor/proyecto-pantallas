from selenium import webdriver
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import xlsxwriter
import time

driver1=webdriver.Firefox()
driver1.set_window_position(1921,0,windowHandle='current')
driver1.maximize_window()
driver1.get("http://localhost/proyecto-pantallas/index.php?pantalla=alumno")
driver1.fullscreen_window()

driver2=webdriver.Firefox()
driver2.set_window_position(0,0,windowHandle='current')
driver2.maximize_window()
driver2.get("http://localhost/proyecto-pantallas/index.php?pantalla=profesor")
driver2.fullscreen_window()
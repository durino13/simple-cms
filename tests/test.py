from selenium import webdriver
from selenium.webdriver.common.keys import Keys

driver = webdriver.Firefox()
driver.get("http://dev.yuma.sk/administrator")
emailElem = driver.find_element_by_css_selector("button.btn > i.fa.fa-btn")
driver.close()

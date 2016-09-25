from selenium import webdriver

driver = None

def getDriver():
    global driver
    driver = driver or webdriver.Chrome('/home/marusiju/.chromedriver/chromedriver')
    return driver
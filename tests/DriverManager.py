from selenium import webdriver

driver = None

def getDriver():
    global driver
    driver = driver or webdriver.Firefox()
    return driver
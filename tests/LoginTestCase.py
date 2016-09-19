import unittest
import DriverManager
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

class LoginTestCase(unittest.TestCase):

    def setUp(self):
        self.driver = DriverManager.getDriver()

    def test_login(self):
        driver = self.driver
        driver.get("http://dev.yuma.sk/administrator")
        emailElem = driver.find_element_by_name("email")
        emailElem.send_keys("durino13@gmail.com")
        passwordElem = driver.find_element_by_name("password")
        passwordElem.send_keys("extrem1xtreme")
        button = driver.find_element_by_tag_name("button")
        button.click()
        assert "List of articles" in driver.page_source

if __name__ == "__main__":
    unittest.main()

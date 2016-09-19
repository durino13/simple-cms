import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

class CreateArticleTestCase(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_create_article(self):
        driver = self.driver
        driver.get("http://dev.yuma.sk/administrator")
        driver.find_element_by_id("new_article").click()

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()

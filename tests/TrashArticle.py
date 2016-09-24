import unittest
import DriverManager
import LoginTestCase
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select

class TrashArticle(unittest.TestCase):

    def setUp(self):
        self.driver = DriverManager.getDriver()

    def test_trash_article(self):
        driver = self.driver

        # Login
        unittest.main(module=LoginTestCase, exit=False)

        # Trash article
        driver.get('http://dev.yuma.sk/administrator/article')
        driver.find_element_by_css_selector('.odd:nth-child(1) .dropdown-toggle').click()
        articleId = self.trashArticle('li+ li .jquery-postback')

        # Verify the article is in the trash
        driver.find_element_by_css_selector('#fouc > div > div.status-message > div > ul > li')

    # Action will return the ID of the trashed article
    def trashArticle(self, selector):
        elem = self.driver.find_element_by_css_selector(selector)
        href = elem.get_attribute('href')   # The last element in the href is article ID
        elem.click()
        return href.rsplit('/', 1)[-1]


    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()

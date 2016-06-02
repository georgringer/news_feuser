# TYPO3 CMS Extension news_feuser

This extension extends the news record by a relation to a **FE User**.

## Requirements

- TYPO3 CMS 6.2-8.2
- EXT:news 3.2.5+
- License: GPL 2

## Installation

Install the extension as any other extension.

If you use composer, use either ``"georgringer/news-feuser":"1.0.*`` or ``"typo3-ter/news-feuser":"1.0.*``

## Usage

After filling out the relation, you are able to output the fe user with

```
// Show the full model
<f:debug>{newsItem.newsFeUser}</f:debug>
// Show the name
<f:if condition="{newsItem.newsFeUser}">
    {newsItem.newsFeUser.firstName} {newsItem.newsFeUser.lastName}
</f:if>
```
from textblob import TextBlob
import tweepy
import matplotlib.pyplot as plt
import nltk
import sys


def percentage (part, whole):
    return 100 * float(part)/float(whole)


# print ("Success");
consumerKey = "08bPamgsP5hiCc28XyO1guECJ"
consumerSecret = "Ryq7BsWmyydrj7osj2bHX6ARQ15MXh8eRclboLv1SqljVRURZr"
accessToken = "1150022343818981376-e89DA7CsFnFfFtG2oArWRakcG3mKkW"
accessTokenSecret = "YBIcLywmQsDxjXgGuQubMxWZpwGrzXpehSMVjYBtcbVTf"


auth = tweepy.OAuthHandler(consumer_key=consumerKey, consumer_secret=consumerSecret)
auth.set_access_token(accessToken, accessTokenSecret)
api = tweepy.API(auth)

searchTerm = sys.argv[1];
noOfSearchTerms = int(sys.argv[2]);

tweets = tweepy.Cursor(api.search, q=searchTerm).items(noOfSearchTerms)


positive = 0
negative = 0
nuetral = 0
polarity = 0
tweet_count = 0

for tweet in tweets:
    tweet_count += 1
    analysis = TextBlob(tweet.text)
    polarity += analysis.sentiment.polarity

    if (analysis.sentiment.polarity == 0):
        nuetral += 1
    elif (analysis.sentiment.polarity < 0.00):
        negative += 1
    elif (analysis.sentiment.polarity > 0.00):
        positive += 1


positive = percentage(positive, noOfSearchTerms)
negative = percentage(negative, noOfSearchTerms)
nuetral = percentage(nuetral, noOfSearchTerms)
polarity = percentage(polarity, noOfSearchTerms)

positive = format(positive, '.2f')
negative = format(negative, '.2f')
nuetral = format(nuetral, '.2f')


# print('How people are reacting on ' +searchTerm + ' by analyzing' + str(noOfSearchTerms) + ' Tweets.')

print (
    str(positive) + ',' + str(negative) + ',' + str(nuetral) +',' + str(tweet_count)
)

# labels = ['Positive ['+str(positive)+'%]', 'Negative ['+str(negative)+'%]', 'Nuetral ['+str(nuetral)+'%]']
# sizes = [positive, nuetral, negative]
# colors = ['yellowgreen', 'gold', 'red']
# patches, texts = plt.pie(sizes, colors=colors, startangle=90)
# plt.legend(patches, labels, loc="best")
# plt.title('How people are reacting on ' +searchTerm + ' by analyzing' + str(noOfSearchTerms) + ' Tweets.')
# plt.axis('equal')
# plt.tight_layout()
# plt.show()

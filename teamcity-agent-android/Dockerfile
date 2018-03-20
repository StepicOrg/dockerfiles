FROM stepik/teamcity-agent-base:2017.2.2
MAINTAINER Pavel Sviderski <ps@stepik.org>

ENV ANDROID_HOME /opt/android-sdk-linux

RUN apt-get update && apt-get install --no-install-recommends -y \
    # required to build/install fastlane
    ruby ruby-dev g++ \
 && rm -rf /var/lib/apt/lists/*

# The official jetbrains/teamcity-minimal-agent image is based on JRE 8 Update 161
# with limited Java tool set available due to Oracle license policy.
# Install JDK 8 Update 161 over the existing Java installation.
RUN curl -C - -L -# -H "Cookie: oraclelicense=accept-securebackup-cookie" -o /tmp/jdk.tar.gz \
    "http://download.oracle.com/otn-pub/java/jdk/8u161-b12/2f38c3b165be4555a1fa6e98c45e0808/jdk-8u161-linux-x64.tar.gz" \
 && tar xvzf /tmp/jdk.tar.gz --strip-components 1 -C $(dirname $JRE_HOME)

# Import the Let's Encrypt Authority certificate for Java to accept TeamCity server certificate
RUN curl -o /root/lets-encrypt.der https://letsencrypt.org/certs/lets-encrypt-x3-cross-signed.der \
 && $JRE_HOME/bin/keytool -trustcacerts -keystore $JRE_HOME/lib/security/cacerts -storepass changeit \
    -noprompt -importcert -alias lets-encrypt-x3-cross-signed -file /root/lets-encrypt.der \
 && rm /root/lets-encrypt.der

# Install Android SDK command line tools
RUN mkdir $ANDROID_HOME \
 && curl -o /tmp/sdk-tools-linux.zip https://dl.google.com/android/repository/sdk-tools-linux-3859397.zip \
 && unzip -d $ANDROID_HOME /tmp/sdk-tools-linux.zip && rm -f /tmp/sdk-tools-linux.zip \
 && chown -R $USER:$USER $ANDROID_HOME

# Accept all Android SDK package licenses
RUN yes | gosu $USER $ANDROID_HOME/tools/bin/sdkmanager --licenses --verbose

# Install Android SDK packages
COPY package-list.txt $ANDROID_HOME/
RUN gosu $USER $ANDROID_HOME/tools/bin/sdkmanager --package_file=$ANDROID_HOME/package-list.txt --verbose

# Install fastlane
RUN gosu $USER gem install --no-document --user-install fastlane

ENV PATH $HOME/.gem/ruby/2.3.0/bin:$PATH
